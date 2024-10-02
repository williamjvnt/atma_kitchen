<?php

use App\Http\Controllers\Api\bahanBakuController as ApiBahanBakuController;
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
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Models\pengeluaran_lain;
use App\Models\customer;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\detail_transaksi;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\catalogController;

Route::get('/', function () {
    return view('customer/homePage');
})->name('home');

Route::post('/action', [App\Http\Controllers\CustomerController::class, 'login'])->name('loginCust');


Route::get('/', [CustomerController::class, 'loginSuccess'])->name('login');

Route::get('home', function () {
    $produk = Produk::all();
    // dd(Auth::check());
    // dd(Auth::check());
    $klontong = transaksi::where('id_customer', Auth::user()->id)
        ->where(function ($query) {
            $query->where('status_transaksi', 'di dalam keranjang')
                ->orWhere('status_transaksi', 'di dalam keranjang(pre-order)')
                ->orWhere('status_transaksi', 'proses pembayaran');
        })
        ->get();    // dd($klontong->isEmpty());
    return view('customer.homePageCustomer', compact('produk', 'klontong'));
})->name('home')->middleware('auth');

Route::get('keranjangKosong', [catalogController::class, 'indexCustomer'])->name('klontongKosong')->middleware('auth');
Route::get('keranjang', [catalogController::class, 'klontong'])->name('klontong')->middleware('auth');

route::get('uploadBuktiPreOrder', function () {
    $klontong = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang(pre-order)')->get();
    // dd($klontong);
    $detail = detail_transaksi::where('id_transaksi', $klontong[0]->id)->get();
    foreach ($detail as $key => $value) {
        if ($value->stok_produk === 0 && $value->kuota == 0) {
            redirect('klontong');
        }
    }
    // dd($klontong[0]->jumlah_transaksi_produk);
    $tmp = 0;
    // dd($tmp);
    if ($klontong[0]->customer->poin_customer > 0) {
        $tmp = $klontong[0]->customer->poin_customer * 100;
    }
    $temp = $klontong[0]->jumlah_transaksi_produk - $tmp;
    $poin = 0;

    while ($temp >= 1000000) {
        $poin += 200;
        $temp -= 1000000;
    }
    while ($temp >= 500000) {
        $poin += 75;
        $temp -= 500000;
    }
    // dd($temp);
    while ($temp >= 100000) {
        $poin += 15;

        $temp -= 100000;
        // dd($temp);
    }
    // dd($poin);
    while ($temp >= 10000) {
        $poin += 1;
        $temp -= 10000;
    }

    // dd($poin);
    $temp = $klontong[0]->jumlah_transaksi_produk - $tmp;
    return view('customer.uploadBuktiPO', compact('klontong', 'poin', 'temp'));
})->middleware('auth');

route::get('uploadBukti', function () {
    $klontong = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang')->get();

    // dd($klontong[0]->jumlah_transaksi_produk);
    $tmp = 0;
    // dd($tmp);
    if ($klontong[0]->customer->poin_customer > 0) {
        $tmp = $klontong[0]->customer->poin_customer * 100;
    }
    $temp = $klontong[0]->jumlah_transaksi_produk - $tmp;
    $poin = 0;

    while ($temp >= 1000000) {
        $poin += 200;
        $temp -= 1000000;
    }
    while ($temp >= 500000) {
        $poin += 75;
        $temp -= 500000;
    }
    // dd($temp);
    while ($temp >= 100000) {
        $poin += 15;

        $temp -= 100000;
        // dd($temp);
    }
    // dd($poin);
    while ($temp >= 10000) {
        $poin += 1;
        $temp -= 10000;
    }
    $temp = $klontong[0]->jumlah_transaksi_produk - $tmp;
    return view('customer.uploadBukti', compact('klontong', 'poin', 'temp'));
})->middleware('auth');

Route::get('register/verify/{verify_key}', [App\Http\Controllers\Api\authController::class, 'verify'])->name('verify');
Route::get('logout', [CustomerController::class, 'actionLogout'])->name('actionLogout');
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
Route::resource('catalog', App\Http\Controllers\catalogController::class);
// Route::get('catalogCustomer', [catalogController::class, 'indexCustomer'])->name('indexCustomer');
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

route::get('Admin/manageTitipan', [ProdukController::class, 'titipan'])->name('manageTitipan');
Route::get('titipan/create', [ProdukController::class, 'createTitipan'])->name('titipan.add');
Route::get('titipan/edit/{id}', [ProdukController::class, 'editTitipan'])->name('titipan.edit');

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

Route::get('MO/daftarPesanan', [transaksiController::class, 'diterima'])->name('daftarPesanan');
Route::get('MO/processPesanan', [transaksiController::class, 'process'])->name('processPesanan');
Route::Post('MO/accPesanan', [transaksiController::class, 'update'])->name('accPesanan');

Route::get('MO/managePengadaanBahanBaku', [DetailPengadaanController::class, 'index'])->name('managePengadaan');
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


//owner
Route::get('laporan/{active_karyawan_id}', [BahanBakuController::class, 'laporan'])->name('laporan');
Route::get('print/laporanBahanBaku', [BahanBakuController::class, 'print'])->name('laporanBahanBaku');

Route::get('laporanProduk/{active_karyawan_id}', [TransaksiController::class, 'laporan'])->name('laporanProduk');
Route::get('print/laporanProduk', [TransaksiController::class, 'print'])->name('print');
