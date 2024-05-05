<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penitip;

class PenitipController extends Controller
{
    public function index()
    {
        $penitip = penitip::all();
        // dd($penitip);
        return view('MO.managePenitip', compact('penitip'));
    }
    public function create()
    {
        // Mengambil semua penitip
        $penitip = penitip::all();
        // dd($penitip);
        // Mengembalikan tampilan formulir dengan data penitip
        return view('MO.addPenitip', compact('penitip'));
    }

    public function edit($id)
    {
        // dd($id);
        $penitip = penitip::find($id);
        // dd($penitip);
        return view('MO.editPenitip', compact('penitip'));
    }
}
