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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'ProductController@products');
Route::get('/admin/categories', 'ProductController@categories');
Route::get('/admin/category/add', 'ProductController@addCategories');
Route::post('/admin/category', 'ProductController@storeCategories');

Route::get('/admin/product/add', 'ProductController@addProduct');
Route::post('/admin/product', 'ProductController@storeProduct');

Route::post('/cart', 'CartController@addToCart');
Route::post('/remove-cart', 'CartController@removeFromCart');
Route::get('/cart', 'CartController@cart');
