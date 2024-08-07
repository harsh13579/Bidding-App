<?php

namespace App\Http\Controllers;
use Str;
use Hash;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\OutbidNotification;

class ProductController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('Logins.forgetPassword');
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        if(DB::table('password_reset_users')->where('email',$request->email)->exists())
        {
            DB::table('password_reset_users')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
            ]);
        }
        else{
            DB::table('password_reset_users')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);    
        }
        Mail::send('emails.UserforgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function showResetPasswordForm($token)
    { 
        return view('Logins.forgetPasswordLink', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_reset_users')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = DB::table('users')->where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_users')->where(['email'=> $request->email])->delete();

        return redirect()->route('LoginView')->with('success',"Password Changed Successfully");
    }
    private function sanitizeTableName($name)
    {
        return preg_replace('/[^a-zA-Z0-9_]/', '_', strtolower($name));
    }
    public function AddProduct(Request $request)
    {
        $request->validate([
            'prod_name' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required',
            'minbid' => 'required',
            'enddate' => 'required'
        ]);
        $user = Session::get('user');
        if($request->hasFile('photo')) 
        {
            $image = $request->file('photo');
            $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
            $filename = $timestamp . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('Products_Pics', $image, $filename);
            $path = 'Products_Pics/' . $filename;
            $productId = DB::table('products')->insertGetId([
                'prod_name' => $request->prod_name,
                'user' => $user->email,
                'photo' => $filename,
                'minbid' => $request->minbid,
                'enddate' => $request->enddate,
                'curbid' => $request->minbid,
                'description' => $request->description,
            ]);
            $bidTableName = 'bid_' . $this->sanitizeTableName($request->prod_name) . '_' . $productId;
            $reviewTableName = 'review_' . $this->sanitizeTableName($request->prod_name) . '_' . $productId;

            if (!Schema::hasTable($bidTableName)) {
                Schema::create($bidTableName, function ($table) {
                    $table->increments('id');
                    $table->decimal('amount', 10, 2); 
                    $table->string('name');
                    $table->string('email');
                    $table->timestamps(); 
                });
            }

            if (!Schema::hasTable($reviewTableName)) {
                Schema::create($reviewTableName, function ($table) {
                    $table->increments('id');
                    $table->string('email');
                    $table->integer('stars');
                    $table->date('date');
                    $table->text('review');
                    $table->string('name');
                    $table->string('profile_pic');
                    $table->timestamps(); 
                });
            }
    
            return redirect()->back()->with('success', 'Product Added Successfully!');
        }
        return redirect()->back()->with('error', 'Error Occured, please try again!');
       
    }
    public function Bid(Request $request)
    {
        $request->validate([
            'straightBid' => 'required|numeric|min:1',
            'maxBid' => 'required|numeric|min:1',
            'productId' => 'required|exists:products,id',
        ]);
        $user = Session::get('user');
        if(!$user) 
            return redirect('LoginView');
        $product = DB::table('products')->where('id', $request->productId)->first();
        if(!$product) 
            return redirect()->back()->withErrors(['error' => 'Product not found.']);

        $maxBid = max($request->straightBid, $request->maxBid);
        if($maxBid <= $product->curbid) 
        {
            return redirect()->route('Auctions')->with('error', 'Invalid bid. Your bid must be higher than the current bid.');
        }
        DB::table('products')->where('id', $request->productId)->update(['curbid' => $maxBid]);

        $bidTableName = 'bid_' . $this->sanitizeTableName($product->prod_name) . '_' . $request->productId;
        $latestBidder = DB::table($bidTableName)->orderBy('created_at', 'desc')->limit(1)->first();
        DB::table($bidTableName)->insert([
            'amount' => $maxBid, 
            'email' => $user->email,
            'name' => $user->firstname,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($latestBidder) {
            $latestBidderDetails = DB::table('users')->where('email', $latestBidder->email)->select('firstname','lastname', 'email_subs')->first();

            if ($latestBidderDetails && $latestBidderDetails->email_subs) {
                $details = [
                    'name' => $latestBidderDetails->firstname.' '.$latestBidderDetails->lastname,
                    'product_name' => $product->prod_name,
                    'new_bidder' => $user->firstname,
                    'new_bid' => $maxBid
                ];

                Mail::to($latestBidder->email)->send(new OutbidNotification($details));
            }
        }
        return redirect()->route('Auctions')->with('success', 'Your bid was successfully placed!');
    }
    public function ProductDetails($id)
    {
        $product = "select * from products where id =". $id.";";
        $products= DB::select($product);
        $prod_name=$products[0]->prod_name;
        $bidTableName = 'bid_' . $this->sanitizeTableName($prod_name) . '_' . $id;
        $reviewTableName = 'review_' . $this->sanitizeTableName($prod_name) . '_' . $id;
        $bidTable= "select * from ". $bidTableName. " order by amount desc ;"; 
        $bidTables= DB::select($bidTable);
        $reviewTable = "select * from ". $reviewTableName. " order by created_at desc;"; 
        $reviewTables = DB::select($reviewTable);
        return view('Logins.Product_View',['product'=>$products,'reviewTable'=>$reviewTables,'bidTable'=>$bidTables]);
    }
    public function AddReview(Request $request)
    {
        $user=Session::get('user');
        if(!$user)
            return redirect('LoginView');
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required',
        ]);
        $product = "select * from products where id =".$request->productId.";";
        $products= DB::select($product);
        $prod_name=$products[0]->prod_name;
        $username=$user->firstname .' '. $user->lastname;
        $reviewTableName = 'review_' . $this->sanitizeTableName($prod_name) . '_' . $request->productId;
        DB::table($reviewTableName)->insert([
            'email' => $user->email,
            'stars' => $request->input('rating'),
            'date' => now()->toDateString(),
            'review' => $request->input('review'),
            'name' => $username,
            'profile_pic' => $user->profile_pic,
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
        return redirect()->back()->with(['success' => 'Review Added Successfully']);
    }
    public function DeleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $bidTableName = 'bid_' . $this->sanitizeTableName($product->prod_name) . '_' . $id;
        $reviewTableName = 'review_' . $this->sanitizeTableName($product->prod_name) . '_' . $id;
        if ($product) {
            DB::table('products')->where('id', $id)->delete();
            Schema::dropIfExists($bidTableName);
            Schema::dropIfExists($reviewTableName);
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }
}
