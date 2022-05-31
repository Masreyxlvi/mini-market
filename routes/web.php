<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenjualanController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'users' => User::where('id' , auth()->user()->id)->get()
    ]);
})->middleware('auth');

Route::get('/dashboard/pengajuan/cetak_PDF/', [PengajuanController::class, 'cetak_pdf']);


Route::post('/barang/ditarik' , [BarangController::class,  'updateDitarik'])->name('ditarik');
Route::post('/barang/dipenuhi' , [PengajuanController::class,  'updateDipenuhi'])->name('dipenuhi');

Route::get('/dashboard/laporan', [LaporanController::class, 'pembelian'])->middleware('auth');              

Route::resource('dashboard/barang', BarangController::class)->middleware('status');
Route::resource('dashboard/produk', ProdukController::class)->middleware('auth');
Route::resource('dashboard/pelanggan', PelangganController::class)->middleware('auth');
Route::resource('dashboard/pemasok', PemasokController::class)->middleware('auth');

Route::resource('dashboard/pembelian', PembeliController::class)->middleware('auth');
Route::resource('dashboard/penjualan', PenjualanController::class)->middleware('auth');
Route::resource('dashboard/register', RegisterController::class)->middleware('auth');
Route::resource('dashboard/pengajuan', PengajuanController::class)->middleware('auth');

