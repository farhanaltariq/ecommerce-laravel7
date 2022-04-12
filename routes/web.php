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
    Route::get('/produk/search', 'ProdukController@search')->name('produk.search');
    Route::get('/pesanan/export', [App\Http\Controllers\PesananController::class, 'export'])->name('pesanan.export');
    Route::get('/pesanan/search', [App\Http\Controllers\PesananController::class, 'search'])->name('pesanan.search');
    Route::post('/produk/import', 'ProdukController@import')->name('produk.import');
    Route::post('/pesanan/import', 'PesananController@import')->name('pesanan.import');
    Route::resources([
        'home' => HomeController::class,
        'kategori' => KategoriController::class,
        'pesanan' => PesananController::class,
        'produk' => ProdukController::class,
    ]);
});

