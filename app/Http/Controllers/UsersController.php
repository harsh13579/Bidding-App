<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class UsersController extends Controller
{
    public function UserSignUpView()
    {
        return view('Logins/SignUp');
    }
    public function UserSignUpSuccess()
    {
        return view('Logins/SignUpSuccess');
    }
    public function UserLoginView()
    {
        return view('Logins/Login');
    }
    public function Auctions()
    {
        $prod = "select * from products;";
        $products = DB::select($prod);
        return view('Auctions', ['products' => $products]);
    }
    public function MyAuctions()
    {
        $user = Session::get('user');
        $users = "select * from users where email='". $user->email ."';"; 
        $stmt="select * from products where user='". $user->email ."';"; 
        $products = DB::select($stmt);
        $users = DB::select($users);
        return view('Logins.MyAuctions', ['products' => $products, 'user'=>$users]);
    }
    public function SignUp(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'firstname' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'lastname' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return redirect('SignUpView')->withErrors($validator)->withInput();
        }
        $firstname= $request->input('firstname');
        $lastname= $request->input('lastname');
        $email= $request->input('email');
        $password= $request->input('password');
        $hashedpassword=Hash::make($password);
        $email_subs=$request->input('email_subs');
        if($email_subs==NULL)
            DB::insert('insert into users (firstname,lastname,email,password,email_subs) values(?,?,?,?,?)',[$firstname,$lastname,$email,$hashedpassword,0] );
        else
        DB::insert('insert into users (firstname,lastname,email,password,email_subs) values(?,?,?,?,?)',[$firstname,$lastname,$email,$hashedpassword,$email_subs] );
        return redirect()->route('SignUpSuccess');   
    }
    public function Login(Request $request)
    {
        $rules = [
            'email'=>'required|string|email|exists:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return redirect('LoginView')->withInput()->withErrors($validator);
        }
        else
        {
            $email = $request->input('email');
            $password= $request->input('password');
            $user1 = DB::table('users')->where('email', $email)->first();
            $pass = DB::table('users')->where('email', $email)->value('password');
            if(HASH::check($password,$pass))
            {
                $prod = "select * from products;";
                $products = DB::select($prod);
                Session::put('user',$user1);
                return redirect('Auctions');
            }
            else
                return back()->withInput()->withErrors(['password' => 'Wrong Password!']);
        }
    }
    public function UserSession()
    {
        $user = Session::get('user');
        if($user)
            return $user->firstname;
        return "Guest";
    }

    public function UserProfile()
    {
        $user = Session::get('user');
        if($user)
        {
            $stmt="select * from users where email='". $user->email ."';"; 
            $users = DB::select($stmt);
            return view('Profile',['users'=>$users]);
        }
        else
            return view('/');
    }
    public function Logout()
    {
        Session::forget('user');
        return redirect('/');
    }
    public function ChangeProfilePic(Request $request)
    {
        $user = Session::get('user');
        $email=$user->email;
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $filename = $email . '.' . $image->getClientOriginalExtension();
            $path = 'Profile_Pics/' . $filename;
            $user->profile_pic = $filename;
            Session::put('user',$user);
            Storage::disk('public')->putFileAs('Profile_Pics', $image, $filename);
            DB::table('users')
                ->where('email', $email)
                ->update(['profile_pic' => $filename]);
            return redirect()->back()->with('success', 'Profile picture updated successfully!');
        }
        return redirect()->back()->with('error', 'No profile picture uploaded.');
    }
}
