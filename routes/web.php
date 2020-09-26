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

// Route::get('/send-notification',function() {
//     Auth::user()->notify(new TaskCompleted);
//     return view('home');
// });

// Route::get('/markAsRead',function() {
//     auth()->user()->unreadNotifications->markAsRead();
//     return redirect()->back();
// });

Route::get('/layouts', function () {
    return view('layouts.frontend.main');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/profil', 'Frontend\UserController@profilUser');
    Route::get('/aktivasi-akun', 'Frontend\UserController@formAktivasiAkun');
    Route::post('/aktivasi-akun', 'Frontend\UserController@aktivasiAkun')->name('aktivasi.akun');
});

Route::get('/session-login', 'Auth\SessionLoginController@sessionLogin')->name('session.login');

Route::group(['prefix' => 'admin'], function () {
    //DASHBOARD
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
    // KATEGORI
    Route::resource('kategori', 'Backend\KategoriController');
    Route::get('/kategori/delete/{id}', 'Backend\KategoriController@destroy');
    // PRODUK
    Route::resource('produk', 'Backend\ProdukController');
    Route::get('/produk/delete/{id}', 'Backend\ProdukController@destroy');
});
