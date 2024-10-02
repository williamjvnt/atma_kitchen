<?php

namespace App\Http\Controllers;

use App\Models\pengadaan_bahan_baku;
use App\Models\bahan_baku;
use App\Models\detail_pengadaan;
use Illuminate\Http\Request;

class DetailPengadaanController extends Controller
{
    public function index()
    {
        $pengadaan_bahan_baku = pengadaan_bahan_baku::all();
        $bahan_baku = bahan_baku::all();
        $detail = detail_pengadaan::all();
        // dd($pengadaan_bahan_baku);   
        return view('MO.managePengadaan', compact('detail'));
    }
    public function create()
    {
        $pengadaan_bahan_baku = pengadaan_bahan_baku::all();
        $bahan_baku = bahan_baku::all();
        $detail = detail_pengadaan::all();

        return view('MO.addPengadaan', compact('pengadaan_bahan_baku', 'bahan_baku', 'detail'));
    }

    public function edit($id)
    {
        $pengadaan_bahan_baku = pengadaan_bahan_baku::all();
        $bahan_baku = bahan_baku::all();
        $detail = detail_pengadaan::where('id_pengadaan', $id)->first();

        // Mengambil semua pengadaan_bahan_baku
        return view('MO.editPengadaan', compact('pengadaan_bahan_baku', 'bahan_baku', 'detail'));
    }
}
