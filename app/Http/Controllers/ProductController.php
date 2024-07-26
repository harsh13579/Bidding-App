<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
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
    
            // Create bid table
            if (!Schema::hasTable($bidTableName)) {
                Schema::create($bidTableName, function ($table) {
                    $table->increments('id');
                    $table->decimal('amount', 10, 2); 
                    $table->string('email');
                    $table->timestamps(); 
                });
            }
    
            // Create review table
            if (!Schema::hasTable($reviewTableName)) {
                Schema::create($reviewTableName, function ($table) {
                    $table->increments('id');
                    $table->string('email');
                    $table->integer('stars');
                    $table->date('date');
                    $table->text('review');
                    $table->timestamps(); 
                });
            }
    
            return redirect()->back()->with('success', 'Product Added Successfully!');
        }
        return redirect()->back()->with('error', 'Error Occured, please try again!');
       
    }
}
