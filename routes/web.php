<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/shop', [App\Http\Controllers\HomeController::class, 'index'])->name('homex');
Route::get('/add-products', [App\Http\Controllers\ProductController::class, 'getForm'])->name('add-product');
Route::post('/add-products', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('saveProduct');

//single item
Route::get('/product-detail/{id}', [App\Http\Controllers\ProductController::class, 'singleProduct'])->name('singleProduct');

//contact us
Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'contactUs'])->name('contactUs');

//add to cart
Route::get('/add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addCart'])->name('addCart');

//view cart
Route::get('/view-cart', [App\Http\Controllers\CartController::class, 'viewCart'])->name('viewCart');

Route::patch('/update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update');
Route::delete('/remove-from-cart', [App\Http\Controllers\CartController::class, 'remove'])->name('remove');

Route::get('/checkout', [App\Http\Controllers\OrderingController::class, 'checkOut'])->name('checkOut');
Route::post('/order', [App\Http\Controllers\OrderingController::class, 'placeOrder'])->name('placeOrder');

Route::get('/{id}{id2}', [App\Http\Controllers\HomeController::class, 'categoryProduct'])->name('categoryProduct');
