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





Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/user', 'DashboardController@user');

Route::post('/add-to-cart', 'CartController@addToCart')->name('cart.add');
Route::post('/update', 'CartController@updateCart')->name('cart.update');
Route::get('/cart', 'CartController@cart')->name('cart');

Route::prefix('admin')->group(function(){

  Route::get('/', 'DashboardController@admin')->name('admin.dashboard');
  Route::get('/login', 'DashboardController@adminLogin')->name('admin.login');
  Route::post('/login', 'DashboardController@login')->name('admin.login.submit');

  Route::get('/register', 'Auth\AdminController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'Auth\AdminController@register')->name('admin.register.submit');

  Route::get('/admin-list', 'Auth\AdminController@adminList')->name('admin.list');

  Route::get('{id}/update', 'Auth\AdminController@updateUserForm')->name('admin.update');
  Route::post('{id}/update', 'Auth\AdminController@update')->name('admin.update.submit');

  Route::get('{id}/delete', 'Auth\AdminController@destroyAdmin')->name('admin.destroy');


});

Route::resource('products', 'ProductController');
Route::resource('nav', 'NavController');
