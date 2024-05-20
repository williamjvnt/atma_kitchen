<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [App\Http\Controllers\Api\authController::class, 'register']);
Route::post('/register', [App\Http\Controllers\Api\authController::class, 'register'])->name('registerCust');


Route::get('/produk', [App\Http\Controllers\Api\produkController::class, 'index']);
Route::post('/produk', [App\Http\Controllers\Api\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk', [App\Http\Controllers\Api\produkController::class, 'show'])->name('produk.show');
Route::put('/produk/{id}', [App\Http\Controllers\Api\produkController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [App\Http\Controllers\Api\produkController::class, 'destroy'])->name('produk.destroy');


Route::get('/hampers', [App\Http\Controllers\Api\hampersController::class, 'index']);
Route::post('/hampers', [App\Http\Controllers\Api\hampersController::class, 'store'])->name('hampers.store');
Route::get('/hampers', [App\Http\Controllers\Api\hampersController::class, 'show'])->name('hampers.show');
Route::put('/hampers/{id}', [App\Http\Controllers\Api\hampersController::class, 'update'])->name('hampers.update');
Route::delete('/hampers/{id}', [App\Http\Controllers\Api\hampersController::class, 'destroy'])->name('hampers.destroy');


Route::get('/bahanBaku', [App\Http\Controllers\Api\bahanBakuController::class, 'index']);
Route::post('/bahanBaku', [App\Http\Controllers\Api\bahanBakuController::class, 'store'])->name('bahanBaku.store');
Route::get('/bahanBaku', [App\Http\Controllers\Api\bahanBakuController::class, 'show'])->name('bahanBaku.show');
Route::put('/bahanBaku/{id}', [App\Http\Controllers\Api\bahanBakuController::class, 'update'])->name('bahanBaku.update');
Route::delete('/bahanBaku/{id}', [App\Http\Controllers\Api\bahanBakuController::class, 'destroy'])->name('bahanBaku.destroy');

Route::get('/resep', [App\Http\Controllers\Api\resepController::class, 'index']);
Route::post('/resep', [App\Http\Controllers\Api\resepController::class, 'store'])->name('resep.store');
Route::get('/resep', [App\Http\Controllers\Api\resepController::class, 'show'])->name('resep.show');
Route::put('/resep/{id}', [App\Http\Controllers\Api\resepController::class, 'update'])->name('resep.update');
Route::delete('/resep/{id}', [App\Http\Controllers\Api\resepController::class, 'destroy'])->name('resep.destroy');

Route::get('/pengadaan', [App\Http\Controllers\Api\pengadaanBahanBakuController::class, 'index']);
Route::post('/pengadaan', [App\Http\Controllers\Api\detailPengadaanBahanBakuController::class, 'store'])->name('pengadaan.store');
Route::get('/pengadaan', [App\Http\Controllers\Api\detailPengadaanBahanBakuController::class, 'show'])->name('pengadaan.show');
Route::put('/pengadaan/{id}', [App\Http\Controllers\Api\detailPengadaanBahanBakuController::class, 'update'])->name('pengadaan.update');
Route::delete('/pengadaan/{id}', [App\Http\Controllers\Api\detailPengadaanBahanBakuController::class, 'destroy'])->name('pengadaan.destroy');

Route::get('/PengeluaranLain', [App\Http\Controllers\Api\pengeluaranLainController::class, 'index']);
Route::post('/PengeluaranLain', [App\Http\Controllers\Api\pengeluaranLainController::class, 'store'])->name('pengeluaranLain.store');
Route::get('/PengeluaranLain', [App\Http\Controllers\Api\pengeluaranLainController::class, 'show'])->name('pengeluaranLain.show');
Route::put('/PengeluaranLain/{id}', [App\Http\Controllers\Api\pengeluaranLainController::class, 'update'])->name('pengeluaranLain.update');
Route::delete('/PengeluaranLain/{id}', [App\Http\Controllers\Api\pengeluaranLainController::class, 'destroy'])->name('pengeluaranLain.destroy');

Route::get('/Penitip', [App\Http\Controllers\Api\penitipController::class, 'index']);
Route::post('/Penitip', [App\Http\Controllers\Api\penitipController::class, 'store'])->name('penitip.store');
Route::get('/Penitip', [App\Http\Controllers\Api\penitipController::class, 'show'])->name('penitip.show');
Route::put('/Penitip/{id}', [App\Http\Controllers\Api\penitipController::class, 'update'])->name('penitip.update');
Route::delete('/Penitip/{id}', [App\Http\Controllers\Api\penitipController::class, 'destroy'])->name('penitip.destroy');

// Route::post('/loginEmployee', [App\Http\Controllers\Api\karyawanController::class, 'login']);
Route::post('/karyawan', [App\Http\Controllers\Api\karyawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan', [App\Http\Controllers\Api\karyawanController::class, 'show'])->name('karyawan.show');
Route::put('/karyawan/{id}', [App\Http\Controllers\Api\karyawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [App\Http\Controllers\Api\karyawanController::class, 'destroy'])->name('karyawan.destroy');
