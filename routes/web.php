<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DetailPengadaanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\penitipController;
use App\Http\Controllers\hampersController;
use App\Http\Controllers\PengadaanBahanBakuController;
use App\Http\Controllers\ResepProdukController;
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

route::get('Admin/managehampers', [hampersController::class, 'index'])->name('manageHampers');
Route::get('hampers/create', [hampersController::class, 'create'])->name('hampers.add');
Route::get('hampers/edit/{id}', [hampersController::class, 'edit'])->name('hampers.edit');

route::get('Admin/manageresep', [ResepProdukController::class, 'index'])->name('manageResep');
Route::get('resep/create', [ResepProdukController::class, 'create'])->name('resep.add');
Route::get('resep/edit/{id}', [ResepProdukController::class, 'edit'])->name('resep.edit');


route::get('Admin/managebahanbaku', [BahanBakuController::class, 'index'])->name('manageBahanbaku');
Route::get('bahanbaku/create', [BahanBakuController::class, 'create'])->name('bahanbaku.add');
Route::get('bahanbaku/edit/{id}', [BahanBakuController::class, 'edit'])->name('bahanbaku.edit');
//MO
Route::get('dashboardMO', function () {
    return view('/MO/navbarMODashboard');
})->name('dashboardMO');

route::get('MO/managePengadaanBahanBaku', [DetailPengadaanController::class, 'index'])->name('managePengadaan');
Route::get('pengadaan/create', [DetailPengadaanController::class, 'create'])->name('pengadaan.add');
Route::get('pengadaan/edit/{id}', [DetailPengadaanController::class, 'edit'])->name('pengadaan.edit');
