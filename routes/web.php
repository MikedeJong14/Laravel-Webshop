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
Route::get('/', 'PagesController@index');

Route::resource('posts', 'PostsController');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');

Route::get('/cart', 'CartController@index');
Route::post('/cart/add/{productId}', 'CartController@addToCart');
Route::post('/cart/update/{productId}', 'CartController@updateItemQty');
Route::get('/cart/empty', 'CartController@emptyCart');
Route::get('/cart/remove/{productId}', 'CartController@removeFromCart');

Auth::routes();

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/create', 'OrdersController@create');
Route::get('/orders/store', 'OrdersController@store');
