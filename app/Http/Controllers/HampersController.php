<?php

namespace App\Http\Controllers;

use App\Models\hampers;
use App\Models\bahan_baku;
use Illuminate\Http\Request;

class HampersController extends Controller
{
    public function index()
    {
        $hampers = hampers::all();
        // dd($hampers);
        return view('admin.managehampers', compact('hampers'));
    }
    public function create()
    {
        $hampers = hampers::all();
        return view('admin.addhampers', compact('hampers'));
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
