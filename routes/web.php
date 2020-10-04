<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/layouts', function () {
    return view('layouts.frontend.main');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/profil', 'Frontend\UserController@profilUser');
    Route::get('/aktivasi-akun', 'Frontend\UserController@formAktivasiAkun');
    Route::post('/aktivasi-akun', 'Frontend\UserController@aktivasiAkun')->name('aktivasi.akun');
});

Route::get('/session-login', 'Auth\SessionLoginController@sessionLogin')->name('session.login');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    //DASHBOARD
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
    // KATEGORI
    Route::get('/kategori','Backend\KategoriController@index')->name('kategori.index');
    Route::post('/kategori/store','Backend\KategoriController@store')->name('kategori.store');
    Route::get('/kategori/edit/{id}','Backend\KategoriController@edit');
    Route::get('/kategori/delete/{id}', 'Backend\KategoriController@destroy');
    // PRODUK
    Route::get('/produk','Backend\ProdukController@index')->name('produk.index');
    Route::post('/produk/store','Backend\ProdukController@store')->name('produk.store');
    Route::get('/produk/edit/{id}','Backend\ProdukController@edit');
    Route::get('/produk/delete/{id}', 'Backend\ProdukController@destroy');
});
