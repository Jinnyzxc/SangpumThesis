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
Route::post('/buyer/add', [UsersController::class, 'buyer']);
Route::post('/seller/add', [UsersController::class, 'seller']);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/product/add', [ProductController::class, 'product-add']);


