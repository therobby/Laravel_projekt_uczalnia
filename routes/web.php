<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/shop', 'ShopController@index')->name('shop');
Route::post('/checkout', 'ShopController@checkout')->name('checkout');
// Auth::routes();


Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::post('/admin/products/add', 'AdminController@addProduct')->name('adminAddProduct')->middleware('admin');
Route::get('/admin/products/create', 'AdminController@addProductView')->name('adminAddProductView')->middleware('admin');
Route::delete('/admin/products/delete/{id}', 'AdminController@deleteProduct')->name('adminDeleteProduct')->middleware('admin');

Route::get('/admin/users', 'AdminController@listUsers')->name('adminUsers')->middleware('admin');
Route::post('/admin/ban', 'AdminController@banUser')->name('adminBanUser')->middleware('admin');
Route::get('/admin/notify', 'AdminController@notify')->name('adminNotify')->middleware('admin');
Route::post('/admin/deluser', 'AdminController@delUser')->name('delUser')->middleware('admin');
