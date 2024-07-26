<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('HomePage');
});

//User Controller
Route::get('/SignUpView', [UsersController::class,'UserSignUpView'])->name('SignUpView');
Route::get('/LoginView', [UsersController::class,'UserLoginView'])->name('LoginView');
Route::post('/signup', [UsersController::class, 'SignUp'])->name('SignUp');
Route::post('/login', [UsersController::class, 'Login'])->name('Login');
Route::get('/SignUpSuccess', [UsersController::class,'UserSignUpSuccess'])->name('SignUpSuccess');
Route::get('/UserSession', [UsersController::class,'UserSession'])->name('UserSession');
Route::get('/Auctions', [UsersController::class,'Auctions'])->name('Auctions');
Route::get('/UserProfile', [UsersController::class,'userProfile'])->name('UserProfile');
Route::post('/change-profile_pic', [UsersController::class, 'ChangeProfilePic'])->name('change-profile_pic');
