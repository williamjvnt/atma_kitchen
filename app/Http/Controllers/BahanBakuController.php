<?php

namespace App\Http\Controllers;

use App\Models\bahan_baku;
use App\Models\karyawan;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahan = bahan_baku::all();
        // dd($bahan);
        return view('admin.manageBahanbaku', compact('bahan'));
    }
    public function create()
    {
        $bahan = bahan_baku::all();

        return view('admin.addBahanbaku', compact('bahan'));
    }

    public function edit($id)
    {
        $bahan = bahan_baku::find($id);

        return view('admin.editBahanbaku', compact('bahan'));
    }

    public function laporan($active_karyawan_id)
    {
        $temp = karyawan::where('nama_karyawan', $active_karyawan_id)->first();
        // dd($temp);
        $bahan = bahan_baku::all();
        if ($temp->id_role === 1) {
            return view('MO.laporanStok', compact('bahan'));
        }
        return view('owner.laporanStok', compact('bahan'));

        // dd($active_karyawan_id);
    }

    public function print()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
}
