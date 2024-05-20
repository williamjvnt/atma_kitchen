<?php

namespace App\Http\Controllers;

use App\Models\hampers;
use App\Models\bahan_baku;
use App\Models\detail_hampers;
use App\Models\produk;
use Illuminate\Http\Request;

class HampersController extends Controller
{
    public function index()
    {
        $hampers = hampers::all();
        $detail = detail_hampers::all();
        // dd($hampers);
        return view('admin.managehampers', compact('hampers', 'detail'));
    }
    public function create()
    {
        $hampers = hampers::all();
        $produk = produk::all();
        $detail = detail_hampers::all();
        return view('admin.addhampers', compact('detail', 'hampers', 'produk'));
    }

    public function edit($id)
    {
        $hampers = hampers::find($id);
        //$kategori = Kategori_hampers::all();

        // Mengambil semua penitip
        //$penitip = Penitip::all();
        return view('admin.edithampers', compact('hampers'));
    }
}
