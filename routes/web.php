<?php

use App\Models\Product;
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
    return redirect()->route('home');
});
Route::get('/home','App\Http\Controllers\productController@index' )->name('home');
Route::middleware(['auth'])->get('Mycart','App\Http\Controllers\cartController@show')->name('show.cart');
Route::middleware(['auth'])->get('addProductToCart/{id}','App\Http\Controllers\cartController@addProductToCart')->name('add.cart');
Route::middleware(['auth'])->get('deleteProductFromCart/{id}','App\Http\Controllers\cartController@deleteProductFromCart')->name('delete.cart');
Route::middleware(['auth'])->put('updateQtyProductCart/{id}','App\Http\Controllers\cartController@updateQtyProductCart')->name('update.cart');
Route::middleware(['auth'])->get('checkout','App\Http\Controllers\checkoutController@checkout')->name('checkout');




Route::get('Categorie/{name}','App\Http\Controllers\productController@getProductByCategory')->name('get.category');




Route::get('single-product/{id}','App\Http\Controllers\productController@show')->name('show.product');

