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
    return view('Home');
});

//User Controller
Route::get('/SignUpView', [UsersController::class,'UserSignUpView'])->name('UserSignUpView');
Route::get('/LoginView', [UsersController::class,'UserLoginView'])->name('UserLoginView');
Route::post('/signup', [UsersController::class, 'SignUp'])->name('SignUp');
Route::get('/SignUpSuccess', [UsersController::class,'UserSignUpSuccess'])->name('UserSignUpSuccess');
Route::get('/UserSession', [UsersController::class,'UserSession'])->name('UserSession');
