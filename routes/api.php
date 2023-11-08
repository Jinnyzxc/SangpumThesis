<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedController;
use App\Http\Controllers\ShippingController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/auth/login', [LoginController::class, 'login']);
Route::get('/auth/logout', [LoginController::class, 'logout']);
Route::post('/buyer/add', [UsersController::class, 'buyer']);
Route::post('/users/approval', [UserController::class, 'user_approval']);
Route::get('/buyers', [UserController::class, 'getAllBuyers']);
Route::get('/sellers', [UserController::class, 'getAllSellers']);
Route::post('/seller/add', [UsersController::class, 'seller']);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/product/add', [ProductController::class, 'product_add']);
Route::put('/product/{id}', [ProductController::class, 'product_edit']);
Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/seller', [ProductController::class, 'getAllProductsPerSeller']);
Route::get('/products/view', [ProductController::class, 'getProductsbyID']);



