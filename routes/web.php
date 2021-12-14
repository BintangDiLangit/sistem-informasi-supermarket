<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
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


// 'middleware' => ['auth:api'], 

Route::group(['middleware' => ['auth']], function () {
	Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
	Route::group(['prefix' => "admin"], function () {
		Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
		Route::resource('produk', ProdukController::class);
		Route::resource('kategori', KategoriController::class);
		Route::resource('pemasok', PemasokController::class);
		Route::resource('penjualan', PenjualanController::class);
		Route::resource('pembelian', PembelianController::class);
		Route::put('edit-user', 'UserController@editUser');
	});
});
