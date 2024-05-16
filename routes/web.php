<?php

use App\Http\Controllers\PengeluaranLainController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DetailPengadaanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\penitipController;
use App\Http\Controllers\hampersController;
use App\Http\Controllers\PengadaanBahanBakuController;
use App\Http\Controllers\ResepProdukController;
use App\Models\pengeluaran_lain;
use App\Http\Controllers\CustomerController;
use App\Models\customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('customer/homePage');
//     })->name('home');
// });

Route::get('/', [CustomerController::class, 'loginSuccess'])->name('login');
Route::get('home', function () {
    return view('customer/homePageCustomer');
})->name('home');
Route::get('register/verify/{verify_key}', [App\Http\Controllers\Api\authController::class, 'verify'])->name('verify');
Route::get('logout', [CustomerController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
// route::get('/', [CustomerController::class, 'login'])->name('login');
// Route::get('/login', function () {
//     return view('customer/loginCust');
// })->name('login');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');
//customer
Route::resource('login', App\Http\Controllers\CustomerController::class);
Route::get('register', [CustomerController::class, 'register'])->name('register');
// Route::get('HomePage', [CustomerController::class, 'loginSuccess'])->name('homePage');

//employee
Route::resource('loginEmployee', App\Http\Controllers\KaryawanController::class);
Route::post('dashboardEmployee', [KaryawanController::class, 'actionLoginEmployee'])->name('dashboardEmployee');

Route::get('dashboardOwner', function () {
    return view('/Owner/navbarOwnerDashboard');
})->name('dashboardOwner');

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

route::get('MO/managePenitip', [penitipController::class, 'index'])->name('managePenitip');
Route::get('penitip/create', [penitipController::class, 'create'])->name('penitip.add');
Route::get('penitip/edit/{id}', [penitipController::class, 'edit'])->name('penitip.edit');

route::get('MO/managePengeluaranLain', [PengeluaranLainController::class, 'index'])->name('managePengeluaranLain');
Route::get('PengeluaranLain/create', [PengeluaranLainController::class, 'create'])->name('pengeluaranLain.add');
Route::get('PengeluaranLain/edit/{id}', [PengeluaranLainController::class, 'edit'])->name('pengeluaranLain.edit');

route::get('MO/manageKaryawan', [KaryawanController::class, 'view'])->name('manageKaryawan');
Route::get('karyawan/create', [karyawanController::class, 'create'])->name('karyawan.add');
Route::get('karyawan/edit/{id}', [karyawanController::class, 'edit'])->name('karyawan.edit');
