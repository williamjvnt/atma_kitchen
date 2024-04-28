<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\penitipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('navbarDashboard');
});
//customer
Route::resource('login', App\Http\Controllers\CustomerController::class);


//employee
Route::resource('loginEmployee', App\Http\Controllers\KaryawanController::class);
Route::post('dashboardEmployee', [KaryawanController::class, 'actionLoginEmployee'])->name('dashboardEmployee');

//admin



Route::get('dashboardAdmin', function () {
    return view('/admin/navbarAdminDashboard');
})->name('dashboardAdmin');

route::get('Admin/manageProduk', [ProdukController::class, 'index'])->name('manageProduk');
Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.add');
Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
//MO
Route::get('dashboardMO', function () {
    return view('/MO/navbarMODashboard');
})->name('dashboardMO');
