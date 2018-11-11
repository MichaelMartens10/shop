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





Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/user', 'DashboardController@user');

Route::prefix('admin')->group(function(){

  Route::get('/', 'DashboardController@admin')->name('admin.dashboard');
  Route::get('/login', 'DashboardController@adminLogin')->name('admin.login');
  Route::post('/login', 'DashboardController@login')->name('admin.login.submit');

});

Route::resource('products', 'ProductController');
