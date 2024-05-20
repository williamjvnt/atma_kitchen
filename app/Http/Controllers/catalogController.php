<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\hampers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class catalogController extends Controller
{
    public function index()
    {
        $produk = produk::all();
        $hampers = hampers::all();
        // dd(Auth::check());
        if (Auth::check()) {
            return view('customer.catalogCustomer', compact('produk', 'hampers'));
        } else {
            return view('catalog', compact('produk', 'hampers'));
            // return view('customer.catalogCustomer', compact('produk', 'hampers'));
        }
    }

    // public function indexCustomer()
    // {
    //     $produk = produk::all();
    //     $hampers = hampers::all();
    //     return view('customer.catalogCustomer', compact('produk', 'hampers'));
    // }
}
