<?php

namespace App\Http\Controllers;

use App\Models\kategori_produk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{

    public function create()
    {
        // Mengambil semua kategori
        $kategori = kategori_produk::all();

        // Mengembalikan tampilan formulir dengan data kategori
        return view('admin.addProduk', compact('kategori'));
    }
}
