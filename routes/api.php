<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [App\Http\Controllers\Api\authController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\authController::class, 'login']);
Route::post('/loginEmployee', [App\Http\Controllers\Api\karyawanController::class, 'login']);


Route::get('/produk', [App\Http\Controllers\Api\produkController::class, 'index']);
Route::post('/produk', [App\Http\Controllers\Api\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}', [App\Http\Controllers\Api\produkController::class, 'show']);
Route::put('/produk/{id}', [App\Http\Controllers\Api\produkController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [App\Http\Controllers\Api\produkController::class, 'destroy'])->name('produk.destroy');;


Route::get('/hampers', [App\Http\Controllers\Api\hampersController::class, 'index']);
Route::post('/hampers', [App\Http\Controllers\Api\hampersController::class, 'store']);
Route::get('/hampers/{id}', [App\Http\Controllers\Api\hampersController::class, 'show']);
Route::put('/hampers/{id}', [App\Http\Controllers\Api\hampersController::class, 'update']);
Route::delete('/hampers/{id}', [App\Http\Controllers\Api\hampersController::class, 'destroy']);


Route::get('/bahanBaku', [App\Http\Controllers\Api\bahanBakuController::class, 'index']);
Route::post('/bahanBaku', [App\Http\Controllers\Api\bahanBakuController::class, 'store']);
Route::get('/bahanBaku/{id}', [App\Http\Controllers\Api\bahanBakuController::class, 'show']);
Route::put('/bahanBaku/{id}', [App\Http\Controllers\Api\bahanBakuController::class, 'update']);
Route::delete('/bahanBaku/{id}', [App\Http\Controllers\Api\bahanBakuController::class, 'destroy']);
