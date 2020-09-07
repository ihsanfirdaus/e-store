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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/layouts',function() {
    return view('layouts.frontend.main');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/profil','Frontend\UserController@profilUser');
    Route::get('/aktivasi-akun','Frontend\UserController@formAktivasiAkun');
    Route::post('/aktivasi-akun','Frontend\UserController@aktivasiAkun')->name('aktivasi.akun');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('kategori', 'Backend\KategoriController');
    Route::get('/kategori/delete/{id}','Backend\KategoriController@destroy');
});