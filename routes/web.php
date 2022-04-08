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
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'home' => HomeController::class,
        'kategori' => KategoriController::class,
        'pesanan' => PesananController::class,
        'produk' => ProdukController::class,
    ]);

    // Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/kategori', 'index')->name('kategori');
    // Route::get('/pesanan', 'PesananController@index')->name('pesanan');
    // Route::get('/produk', 'ProdukController@index')->name('produk');
});

