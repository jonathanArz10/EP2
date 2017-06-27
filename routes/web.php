<?php

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
Route::group(['middleware'=>'admin'], function () {
  Route::get('products/{id}/edit','ProductsController@edit');
  Route::get('products/create','ProductsController@create');
  Route::get('products/delete','ProductsController@destroy');
  Route::resource('categories','CategoriesController');
});
Route::resource('products','ProductsController');
Route::resource('orders','OrdersController');

Route::resource('shopping_carts','ShoppingCartsController');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
