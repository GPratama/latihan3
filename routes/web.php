<?php

use App\Http\Controllers\usercontroller;
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

Route::get('/login','usercontroller@login')->name('login');
Route::post('/postlogin','usercontroller@postlogin')->name('postlogin');
Route::middleware('auth')->get('/','usercontroller@home')->name('home');
Route::get('/register','usercontroller@register')->name('register');
Route::post('/postregister','usercontroller@postregister')->name('postregister');

Route::middleware('auth')->resource('kategori','kategoricontroller');
Route::middleware('auth')->resource('produk','produkcontroller');
Route::middleware('auth')->resource('transaksi','transaksicontroller');
Route::any('/logout','usercontroller@logout')->name('logout');

Route::middleware('auth')->get('/home','homecontroller@home')->name('customer.home');
Route::get('/list','homecontroller@list')->name('customer.list');
Route::get('/detail/{produk}','homecontroller@detail')->name('customer.detail');
Route::get('/keranjang','homecontroller@keranjang')->name('customer.keranjang');
Route::post('/postkeranjang/{produk}','homecontroller@postkeranjang')->name('customer.postkeranjang');
Route::delete('/deletekeranjang/{detailtransaksi}','homecontroller@deletekeranjang')->name('customer.deletekeranjang');
Route::get('/cekout','homecontroller@cekout')->name('customer.cekout');
Route::get('/invoice/{transaksi}','homecontroller@invoice')->name('customer.invoice');
