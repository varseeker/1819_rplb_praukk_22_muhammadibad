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
Route::get('/login', 'Authentikasi@getLogin')->name('login');
Route::post('/login', 'Authentikasi@postLogin');
Route::get('/register', 'Authentikasi@getRegister');
Route::post('/register', 'Authentikasi@postRegister');


Route::get('/search-customer', 'C_Customer@cari');
Route::get('/search-transaksi', 'C_Transaksi@cari');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@index');
    Route::get('/dashboard/history', 'HomeController@logs');

    #Data Customer
    Route::get('/dashboard/customer', 'C_Customer@index');
    Route::get('/dashboard/customer/{customer}/show', 'C_Customer@show');
    Route::get('/dashboard/customer/add', 'C_Customer@create');
    Route::post('/dashboard/customer', 'C_Customer@store');
    Route::get('/dashboard/customer/{customer}/edit', 'C_Customer@edit');
    Route::patch('/dashboard/customer/{customer}/edit', 'C_Customer@update');
    Route::delete('/dashboard/customer/{customer}/show', 'C_Customer@destroy');

    #Data Transaksi
    Route::get('/dashboard/pesanan', 'C_Transaksi@index');
    Route::get('/dashboard/pesanan/laporan', 'C_Transaksi@cetak_pdf');
    Route::get('/dashboard/pesanan/pelanggan', 'C_Transaksi@pengguna');
    Route::get('/dashboard/pesanan/{transaksi}/show', 'C_Transaksi@show');
    Route::get('/dashboard/pesanan/add', 'C_Transaksi@create');
    Route::post('/dashboard/pesanan', 'C_Transaksi@store');
    Route::get('/dashboard/pesanan/{transaksi}/edit', 'C_Transaksi@edit');
    Route::patch('/dashboard/pesanan/{transaksi}/edit', 'C_Transaksi@update');
    Route::delete('/dashboard/pesanan/{transaksi}/show', 'C_Transaksi@destroy');

    #Data Petugas
    Route::get('/dashboard/petugas', 'C_Petugas@index');
    Route::get('/dashboard/petugas/laporan', 'C_Petugas@cetak_pdf');
    Route::get('/dashboard/petugas/{petugas}/show', 'C_Petugas@show');
    Route::get('/dashboard/petugas/add', 'C_petugas@create');
    Route::post('/dashboard/petugas', 'C_petugas@store');
    Route::get('/dashboard/petugas/{petugas}/edit', 'C_Petugas@edit');
    Route::patch('/dashboard/petugas/{petugas}/edit', 'C_Petugas@update');
    Route::delete('/dashboard/petugas/{petugas}/show', 'C_Petugas@destroy');

    #Data Outlet
    Route::get('/dashboard/outlet', 'C_Outlet@index');
    Route::get('/dashboard/outlet/{outlet}/show', 'C_Outlet@show');
    Route::get('/dashboard/outlet/add', 'C_Outlet@create');
    Route::post('/dashboard/outlet', 'C_Outlet@store');
    Route::get('/dashboard/outlet/{outlet}/edit', 'C_Outlet@edit');
    Route::patch('/dashboard/outlet/{outlet}/edit', 'C_Outlet@update');
    Route::delete('/dashboard/outlet/{outlet}/show', 'C_Outlet@destroy');

    #Data Paket
    Route::get('/dashboard/paket', 'C_Paket@index');
    Route::get('/dashboard/paket/{paket}/show', 'C_Paket@show');
    Route::get('/dashboard/paket/add', 'C_Paket@create');
    Route::post('/dashboard/paket', 'C_Paket@store');
    Route::get('/dashboard/paket/{paket}/edit', 'C_Paket@edit');
    Route::patch('/dashboard/paket/{paket}/edit', 'C_Paket@update');
    Route::delete('/dashboard/paket/{paket}/show', 'C_Paket@destroy');

    #Logout
    Route::get('/logout', 'authentikasi@logout');
});
