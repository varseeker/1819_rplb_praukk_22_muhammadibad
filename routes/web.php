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

#Authentikasi
Route::get('/login', 'authentikasi@getLogin')->name('login');
Route::post('/login', 'authentikasi@postLogin');
Route::get('/register', 'authentikasi@getRegister');
Route::post('/register', 'authentikasi@postRegister');

Route::get('/home', function () {
    return view('home');
});

Route::get('/search-customer', 'C_Customer@cari');
Route::get('/search-transaksi', 'C_Transaksi@cari');

Route::get('/dashboard/admin/customer', 'C_Customer@index');
Route::get('/dashboard/admin/customer/{customer}/show', 'C_Customer@show');
Route::get('/dashboard/admin/customer/add', 'C_Customer@create');
Route::post('/dashboard/admin/customer', 'C_Customer@store');
Route::get('/dashboard/admin/customer/{customer}/edit', 'C_Customer@edit');
Route::patch('/dashboard/admin/customer/{customer}/edit', 'C_Customer@update');
Route::delete('/dashboard/admin/customer/{customer}/show', 'C_Customer@destroy');

Route::get('/dashboard/admin', function () {
    return view('dashboard/admin/index');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/dashboard/admin/pesanan', function () {
    return view('dashboard/admin/d_pesanan/index');
});