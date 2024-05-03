<?php

namespace App\Http\Controllers;

use App\Models\bahan_baku;
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
}
