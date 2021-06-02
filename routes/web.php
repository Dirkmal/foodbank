<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CoordinatorPagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\User\TokenController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('coordinator')->group(function () {
    Route::get('/register', [CoordinatorPagesController::class, 'register'])
    ->name('register')->middleware('guest');
    Route::get('/sign-in', [CoordinatorPagesController::class, 'signin'])
    ->name('sign-in')->middleware('guest');
    Route::get('/choose-verification', [CoordinatorPagesController::class, 'chooseverification'])
    ->name('choose-verification');
    Route::get('/forgot-password', [CoordinatorPagesController::class, 'forgotpassword'])
    ->name('forgot-password');
    Route::get('/passwordreset-success', [CoordinatorPagesController::class, 'passwordresetsuccess'])
    ->name('passwordreset-success');
    Route::get('/reset-password', [CoordinatorPagesController::class, 'resetpassword'])
    ->name('reset-password');

    Route::get('/verification-success', [CoordinatorPagesController::class, 'verificationsuccess'])
    ->name('verification-success');
   
});

Route::middleware(['coordinator'])->prefix('coordinator')->group(function () {
    Route::get('/cart', [CoordinatorPagesController::class, 'cart'])
    ->name('cart');
    Route::get('/checkout', [CoordinatorPagesController::class, 'checkout'])
    ->name('checkout');
    Route::get('/checkout-success', [CoordinatorPagesController::class, 'checkoutsuccess'])
    ->name('checkout-success'); 
    Route::get('/dashboard', [CoordinatorPagesController::class, 'coordinatordashboard'])
    ->name('coordinator-dashboard');
    Route::get('/', [CoordinatorPagesController::class, 'coordinatordashboard'])
    ->name('coordinator-dashboard');
    Route::get('/verify-account', [CoordinatorPagesController::class, 'verifyaccount'])
    ->name('verify-account');
    Route::get('/store', [CoordinatorPagesController::class, 'store'])
    ->name('store');
    Route::get('/transactions', [CoordinatorPagesController::class, 'transactions'])
    ->name('transactions');
    Route::get('/orders', [CoordinatorPagesController::class, 'orders'])
    ->name('orders');
});

//Register User
Route::post('/signup', [RegisterController::class, 'store'])
                ->middleware('guest');
//Signs-In User
Route::post('/signin', [LoginController::class, 'login'])
                ->middleware('guest');

//Signs-Out User
Route::get('/signout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth');

//Verify Otp
Route::post('/verify-otp', [TokenController::class, 'verify'])
                ->name('verify-otp');


Route::prefix('coordinator')->group(function () {
    Route::get('/register', [CoordinatorPagesController::class, 'register'])
    ->name('register')->middleware('guest');
    Route::get('/sign-in', [CoordinatorPagesController::class, 'signin'])
    ->name('sign-in')->middleware('guest');
    Route::get('/choose-verification', [CoordinatorPagesController::class, 'chooseverification'])
    ->name('choose-verification');
    Route::get('/forgot-password', [CoordinatorPagesController::class, 'forgotpassword'])
    ->name('forgot-password');
    Route::get('/passwordreset-success', [CoordinatorPagesController::class, 'passwordresetsuccess'])
    ->name('passwordreset-success');
    Route::get('/reset-password', [CoordinatorPagesController::class, 'resetpassword'])
    ->name('reset-password');

    Route::get('/verification-success', [CoordinatorPagesController::class, 'verificationsuccess'])
    ->name('verification-success');
   
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminPagesController::class, 'dashboard'])
    ->name('admin-dashboard');
    Route::get('/', [AdminPagesController::class, 'dashboard'])
    ->name('admin-dashboard');
    Route::get('/store', [AdminPagesController::class, 'store'])
    ->name('admin-store');
    Route::get('/product/{id}', [AdminPagesController::class, 'product'])
    ->name('admin-product');
    Route::get('/loan-requests', [AdminPagesController::class, 'loanrequests'])
    ->name('loan-requests');
    Route::get('/orders', [AdminPagesController::class, 'orders'])
    ->name('admin-orders');
});

Route::prefix('admin')->group(function () {
    Route::get('/sign-in', [AdminPagesController::class, 'signin'])
    ->name('admin-signin')->middleware('guest'); 
});

//Carts
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])
                ->middleware('auth');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])
                ->middleware('auth');
//place order
Route::post('/place-order', [App\Http\Controllers\User\OrderController::class, 'newOrder'])
                ->middleware('auth');

//Signs-In Admin
Route::post('/admin-signin', [AdminLoginController::class, 'login'])
                ->middleware('guest');

//Adds a product to the store
Route::post('/add-product', [ProductController::class, 'addproduct'])
                ->middleware('admin');
//Edits a product 
Route::post('/edit-product', [ProductController::class, 'editproduct'])
                ->middleware('admin');
//Deletes a product 
Route::get('/delete-product/{id}', [ProductController::class, 'deleteproduct'])
                ->middleware('admin');


//Process Order 
Route::get('/process-order/{order_id}', [OrderController::class, 'processOrder'])
                ->middleware('admin');
//DEliver Order 
Route::get('/deliver-order/{order_id}', [OrderController::class, 'deliverOrder'])
                ->middleware('admin');


//Disburse Loan  
Route::get('/disburse-loan/{request_id}', [LoanController::class, 'disburseLoan'])
->middleware('admin');
//DEcline LOan  
Route::get('/decline-loan/{request_id}', [LoanController::class, 'declineLoan'])
                ->middleware('admin');




