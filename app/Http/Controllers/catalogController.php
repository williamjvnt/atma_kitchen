<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\hampers;
use App\Models\detail_hampers;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;

class catalogController extends Controller
{
    public function index()
    {
        $produk = produk::all();
        $hampers = hampers::all();
        $detail = detail_hampers::all();
        // dd(Auth::check());
        if (Auth::check()) {

            $klontong = transaksi::where('id_customer', Auth::user()->id)
                ->where(function ($query) {
                    $query->where('status_transaksi', 'di dalam keranjang')
                        ->orWhere('status_transaksi', 'di dalam keranjang(pre-order)')
                        ->orWhere('status_transaksi', 'proses pembayaran');
                })
                ->get();            // dd($klontong);
            // dd($klontong->isEmpty());
            return view('customer.catalogCustomer', compact('produk', 'hampers', 'detail', 'klontong'));
        } else {
            return view('catalog', compact('produk', 'hampers', 'detail'));
            // return view('customer.catalogCustomer', compact('produk', 'hampers'));
        }
    }

    public function indexCustomer()
    {
        $klontong = transaksi::where('id_customer', Auth::user()->id)
            ->where(function ($query) {
                $query->where('status_transaksi', 'di dalam keranjang')
                    ->orWhere('status_transaksi', 'di dalam keranjang(pre-order)');
                // ->orWhere('status_transaksi', 'proses pembayaran');
            })
            ->get();

        return view('customer.klontongKosong', compact('klontong'));
    }
    // $produk = produk::all();
    //     $hampers = hampers::all();
    //     return view('customer.catalogCustomer', compact('produk', 'hampers'));

    public function klontong()
    {
        $hasil = collect();
        $hasil2 = collect();
        $hasil3 = new Collection();
        $produk = produk::all();
        $hampers = hampers::all();
        $detail = detail_hampers::all();
        $klontong = transaksi::where('id_customer', Auth::user()->id)
            ->where(function ($query) {
                $query->where('status_transaksi', 'di dalam keranjang')
                    ->orWhere('status_transaksi', 'di dalam keranjang(pre-order)')
                    ->orWhere('status_transaksi', 'proses pembayaran');
            })
            ->get();

        $klontongB = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang')->get();
        // dd(!$klontongB->isEmpty());
        if (!$klontongB->isEmpty()) {
            $hasil = detail_transaksi::where('id_transaksi', $klontongB[0]->id)->get();
            // dd($hasil);
            // dd($klontongB[0]->id);
        }


        $klontongP = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang(pre-order)')->get();
        // dd($klontongP);
        if (!$klontongP->isEmpty()) {
            $hasil2 = detail_transaksi::where('id_transaksi', $klontongP[0]->id)->get();
        }
        $klontongX = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->get();
        $count = count($klontongX);
        $i = 0;
        // dd($count);
        if (!$klontongX->isEmpty()) {
            while ($count > $i) {
                $hasil3[$i] = $klontongX[$i];
                // $temp = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->get();
                // $hasil3 = $hasil3->merge($temp);
                $i++;
            }
            // foreach ($klontongX as $transaksi) {
            //     $temp = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->get();
            //     $hasil3 = $hasil3->merge($temp); // Menggabungkan hasil
            // }
        }
        // dd($hasil3);
        return view('customer.klontong', compact('hasil3', 'hasil', 'hasil2', 'produk', 'hampers', 'detail', 'klontong', 'count'));
    }
}
