<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran_lain;
use Illuminate\Http\Request;

class PengeluaranLainController extends Controller
{
    public function index()
    {
        $pengeluaran = pengeluaran_lain::all();
        // dd($pengeluaran);
        return view('MO.managePengeluaranLain', compact('pengeluaran'));
    }
    public function create()
    {
        // Mengambil semua pengeluaran
        $pengeluaran = pengeluaran_lain::all();
        // dd($pengeluaran);
        // Mengembalikan tampilan formulir dengan data pengeluaran
        return view('MO.addPengeluaranLain', compact('pengeluaran'));
    }

    public function edit($id)
    {
        // dd($id);
        $pengeluaran = pengeluaran_lain::find($id);
        // dd($pengeluaran);
        return view('MO.editPengeluaranLain', compact('pengeluaran'));
    }
}
