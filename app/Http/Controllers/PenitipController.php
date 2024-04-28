<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penitip;

class PenitipController extends Controller
{
    public function create()
    {
        // Mengambil semua penitip
        $penitip = penitip::all();
        // dd($penitip);
        // Mengembalikan tampilan formulir dengan data penitip
        return view('admin.addProduk', compact('penitip'));
    }
}
