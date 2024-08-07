<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('products', [ProductController::class,'shop'])->name('products.shop');
Route::get('products/cart', [ProductController::class,'cart'])->name('products.cart');
Route::get('products/create', [ProductController::class,'create'])->name('products.create');
Route::post('products', [ProductController::class,'store'])->name('products.store');
Route::get('products/addcart/{id}',[ProductController::class,'addcart'])->name('products.addcart');
Route::get('products/deletecart/{rowId}', [ProductController::class,'deletecart'])->name('products.delete');
Route::get('products/checkout', [ProductController::class,'checkout'])->name('products.checkout');

Route::get('products/qtyincrement/{rowId}', [ProductController::class,'qtyincrement'])->name('products.qty-increment');
Route::get('products/qtydecrement/{rowId}', [ProductController::class,'qtydecrement'])->name('products.qty-decrement');