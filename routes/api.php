<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\BillingController;
use App\Http\Controllers\Api\DetailsController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\TokenController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user/sendotp', [TokenController::class, 'createToken']);
Route::middleware('auth:api')->get('/user/verify/{otp}', [TokenController::class, 'verify']);
Route::post('/user/reset-password', [TokenController::class, 'resetPassword']);
Route::get('/user/forgot-password/{email}', [TokenController::class, 'forgotPassword']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);






Route::middleware(['auth:api'])->prefix('orders')->group(function () {
    Route::get('all', [OrderController::class, 'orders']); 
    Route::get('products/{id}', [OrderController::class, 'order_products']); 
});


//Products
    Route::get('products', [ProductController::class, 'products']); 
//product
    Route::get('product/{id}', [ProductController::class, 'product']); 

//Balances
Route::middleware(['auth:api'])->group(function () {
Route::get('balance', [WalletController::class, 'balance']); 
Route::get('loan-balance', [WalletController::class, 'loanbalance']); 
});

//Billing
Route::middleware(['auth:api'])->prefix('billing')->group(function () {
    Route::get('/', [BillingController::class, 'billing']); 
    Route::post('update', [BillingController::class, 'update']); 
});
//DEtails
Route::middleware(['auth:api'])->prefix('details')->group(function () {
    Route::get('/', [DetailsController::class, 'details']); 
    Route::post('update', [DetailsController::class, 'update']); 
    Route::post('update-password', [AuthController::class, 'updatePassword']);
});
//Notification
Route::middleware(['auth:api'])->prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'notifications']); 
    Route::get('mark-read/{id}', [NotificationController::class, 'markRead']); 
});
//orders

Route::prefix('orders')->middleware('auth:api')->group(function () {
    Route::get('all', [OrderController::class, 'orders']);
    Route::post('new', [OrderController::class, 'newOrder']);
    Route::get('products/{order_id}', [OrderController::class, 'orderProducts']);
    Route::get('status/{order_id}', [OrderController::class, 'getOrderStatus']);
   
    });

    //loans

Route::prefix('loans')->middleware('auth:api')->group(function () {
    Route::get('all', [LoanController::class, 'loans']);
    Route::post('request', [LoanController::class, 'requestLoan']);
    Route::get('status/{request_id}', [LoanController::class, 'getLoanStatus']);
    Route::post('redeem', [LoanController::class, 'redeemLoan']);
   
    });
















Route::get('vendors', [DowntownController::class, 'vendors']);
Route::get('vendor/{id}', [DowntownController::class, 'vendor']);



Route::prefix('vendors/store')->middleware('auth:api')->group(function () {
    Route::post('new', [VendorController::class, 'newStore']);
    Route::post('edit/{vendor_id}', [VendorController::class, 'editStore']);
    Route::get('all', [VendorController::class, 'myStores']);
});
Route::prefix('vendors/product')->middleware('auth:api')->group(function () {
    Route::post('new/{vendor_id}', [ProductController::class, 'addproduct']);
    Route::post('edit/{product_id}', [ProductController::class, 'editproduct']);
    Route::get('delete/{product_id}', [ProductController::class, 'deleteproduct']);
    Route::get('all/{vendor_id}', [ProductController::class, 'products']);
    Route::get('/{product_id}', [ProductController::class, 'product']);
});
Route::prefix('vendors/order')->middleware('auth:api')->group(function () {
    Route::get('/', [ManageOrderController::class, 'orders']);
});
Route::prefix('downtown')->middleware(['auth:api', 'admin'])->group(function () {
    Route::get('/orders/{filter?}', [DowntownController::class, 'orders']);
    Route::get('/process-product/{orderproduct_id}', [DowntownController::class, 'processOrderProduct']);
    Route::get('/process/{order_id}', [DowntownController::class, 'processOrder']);
    Route::get('/deliver/{order_id}', [DowntownController::class, 'deliverOrder']);
});

