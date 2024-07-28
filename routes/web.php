<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
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
    $prod = "select * from products;";
    $products = DB::select($prod);
    return view('HomePage',['products' => $products]);
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
Route::get('/MyAuctions', [UsersController::class, 'MyAuctions'])->name('MyAuctions');
Route::get('/Logout', [UsersController::class, 'Logout'])->name('Logout');

// Product COntroller
Route::post('/AddProduct', [ProductController::class, 'AddProduct'])->name('AddProduct');
Route::post('/Bid', [ProductController::class, 'Bid'])->name('Bid');
Route::get('/Product/{id}', [ProductController::class, 'ProductDetails'])->name('ProductDetails');
Route::post('/DeleteProduct/{id}', [ProductController::class, 'DeleteProduct'])->name('Delete Product');
Route::post('/AddReview', [ProductController::class, 'AddReview'])->name('AddReview');