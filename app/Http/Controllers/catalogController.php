<?php

namespace App\Http\Controllers;
use App\Models\customer;
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

    public function pay(){
        $stok = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang')->first();
        $po = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang(pre-order)')->first();
        $poin = customer::where('id', Auth::user()->id)->first();

        return view('customer.insert', compact('stok', 'po', 'poin'));

    }


    public function klontong()
    {
        $hasil = collect();
        $hasil2 = collect();
        $hasil3 = collect();
        $count = 0;
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


        //ready stok
        $klontongB = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang')->first();
        // dd(!$klontongB->isEmpty());
        // dd($klontongB);

        if ($klontongB !== null) {
            $hasil = detail_transaksi::where('id_transaksi', $klontongB->id)->get();
            // dd($hasil);
            // dd($klontongB[0]->id);
        }


        //preorder
        $klontongP = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'di dalam keranjang(pre-order)')->first();
        // dd($klontongP);
        if ($klontongP !== null) {
            $hasil2 = detail_transaksi::where('id_transaksi', $klontongP->id)->get();
        }

        //proses pembayaran
        $klontongX = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->first();

        // dd($count);
        if ($klontongX !== null) {
            $hasil3 = detail_transaksi::where('id_transaksi', $klontongX->id)->get();

            // $count = count($hasil3);
            // // dd($hasil);
            // $i = 0;
            // while ($count > $i) {
            //     $hasil3[$i] = $klontongX[$i];

            //     $i++;
            // }

            // $temp = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->get();
            // $hasil3 = $hasil3->merge($temp);
            // foreach ($klontongX as $transaksi) {
            //     $temp = transaksi::where('id_customer', Auth::user()->id)->where('status_transaksi', 'proses pembayaran')->get();
            //     $hasil3 = $hasil3->merge($temp); // Menggabungkan hasil
            // }
        }
        // dd($hasil3);
        // dd($klontongB->jumlah_transaksi_produk);
        return view('customer.klontong', compact('hasil3', 'hasil2', 'hasil', 'produk', 'hampers', 'detail', 'klontong', 'count', 'klontongB', 'klontongP'));
    }
}
