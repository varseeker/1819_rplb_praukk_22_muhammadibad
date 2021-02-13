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
Route::get('/dashboard/admin/customer', function () {
    return view('dashboard/admin/d_customer/index');
});