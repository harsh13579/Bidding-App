<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use Illuminate\Http\Request;
use DB;
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
            return redirect('UserLoginView')->withInput()->withErrors($validator);
        }
        else
        {
            $email = $request->input('email');
            $password= $request->input('password');
            $pass = DB::table('users')->where('email', $email)->value('password');
            if(HASH::check($password,$pass))
            {
                Session::put('user',$email);
                // echo "Logged In\n";
                return redirect('/');
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
}
