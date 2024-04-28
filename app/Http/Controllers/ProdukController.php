<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\produk;
use App\Models\kategori_produk;
use App\Models\penitip;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        // dd($produk);
        return view('admin.manageProduk', compact('produk'));
    }
    public function create()
    {
        // Mengambil semua kategori produk
        $kategori = Kategori_produk::all();

        // Mengambil semua penitip
        $penitip = Penitip::all();

        return view('admin.addProduk', compact('penitip', 'kategori'));
    }

    public function edit($id)
    {
        $produk = produk::find($id);
        $kategori = Kategori_produk::all();

        // Mengambil semua penitip
        $penitip = Penitip::all();
        return view('admin.editProduk', compact('produk', 'penitip', 'kategori'));
    }
}
