<?php

namespace App\Http\Controllers;

use App\Models\resep_produk;
use App\Models\produk;
use Illuminate\Http\Request;

class ResepProdukController extends Controller
{
    public function index()
    {
        $resep = resep_produk::all();
        return view('admin.manageResep', compact('resep'));
    }

    public function create()
    {
        $produk = produk::all();

        $resep = resep_produk::all();

        return view('admin.addResep', compact('resep', 'produk'));
    }

    public function edit($id)
    {
        $resep = resep_produk::find($id);
        $produk = produk::all();
        return view('admin.editResep', compact('resep', 'produk'));
    }
}
