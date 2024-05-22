<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use App\Models\customer;
use App\Models\detail_transaksi;
use App\Models\produk;
use App\Models\hampers;
use App\Models\detail_hampers;
use Carbon\Carbon;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->all();
        $callerId = $request->input('caller_id');
        // dd($callerId);
        //1 = preorder produk
        //2 = cepatkan bayar produk
        //3 = preorder hampers
        //4 = cepatkan bayar hampers
        $tanggalHariIni = date('Y-m-d');
        $realHariIni = date('Y-m-d H:i:s');

        $timestampHariIni = strtotime($tanggalHariIni);
        // dd($callerId);
        $timestampHariMax = strtotime('+2 days', $timestampHariIni);


        if ($callerId == '1') {
            $timestampPengambilan = strtotime($storeData['tanggal_pengambilan']);
            if ($timestampPengambilan < $timestampHariMax) {
                Session::flash('error', 'Pre-Order Tidak Boleh Kurang Dari 2 Hari Sejak Hari Ini');
                // dd(Session);
                // dd(Session::get('error'));
                return redirect()->to(url('catalog'));
            }

            DB::beginTransaction();
            try {
                // $produk = produk::where('id', $storeData['id'])->first();
                $produk = produk::where('id', $storeData['produk_id'])->first();
                // dd($produk);
                // dd($produk);
                $transaksiExist = transaksi::where('status_transaksi', 'di dalam keranjang(pre-order)')->first();
                // dd(empty($transaksiExist));
                // $testing = $storeData['produk_id'];
                // dd($testing);
                if ($transaksiExist) {
                    // dd('exist');
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => $storeData['jumlah_produk'],
                        'total_transaksi_produk' => $storeData['jumlah_produk'] * $produk->harga_produk,
                        'id_produk' => $storeData['produk_id'],
                        'id_transaksi' => $transaksiExist->id,
                    ]);

                    $transaksiExist->jumlah_transaksi_produk = $transaksiExist->jumlah_transaksi_produk + $detail->total_transaksi_produk;
                    $transaksiExist->save();
                    DB::commit();
                    return redirect()->to(url('catalog'));
                } else {
                    // dd('noExist');

                    $transaksi = transaksi::create([
                        // 'jumlah_transaksi_produk' => 
                        'jumlah_poin_transaksi' => 0,
                        'status_transaksi' => 'di dalam keranjang(pre-order)',
                        'tanggal_pesan' => $realHariIni,
                        'tanggal_ambil' => $storeData['tanggal_pengambilan'],
                        'id_customer' => $storeData['id_customer']
                    ]);
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => $storeData['jumlah_produk'],
                        'total_transaksi_produk' => $storeData['jumlah_produk'] * $produk->harga_produk,
                        'id_produk' => $storeData['produk_id'],
                        'id_transaksi' => $transaksi->id,
                    ]);

                    $transaksi->jumlah_transaksi_produk = $detail->total_transaksi_produk;
                    $transaksi->save();
                    // dd('masuk');
                    DB::commit();
                    return redirect()->to(url('catalog'));
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
                return redirect()->to(url('catalog'));
            }
        } else if ($callerId == '2') {
            DB::beginTransaction();
            try {
                $produk = produk::where('id', $storeData['produk_id'])->first();
                $transaksiExist = transaksi::where('status_transaksi', 'di dalam keranjang')->first();
                // dd($transaksiExist->id);
                if ($transaksiExist) {
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => 1,
                        'total_transaksi_produk' => $produk->harga_produk,
                        'id_produk' => $storeData['produk_id'],
                        'id_transaksi' => $transaksiExist->id,
                    ]);
                    $transaksiExist->jumlah_transaksi_produk = $transaksiExist->jumlah_transaksi_produk + $detail->total_transaksi_produk;
                    $transaksiExist->save();
                    DB::commit();

                    return redirect()->to(url('catalog'));
                } else {
                    // dd($storeData);
                    $transaksi = transaksi::create([
                        // 'jumlah_transaksi_produk' => 
                        'jumlah_poin_transaksi' => 0,
                        'status_transaksi' => 'di dalam keranjang',
                        'tanggal_pesan' => $realHariIni,
                        'tanggal_ambil' => $tanggalHariIni,
                        'id_customer' => $storeData['id_customer']
                    ]);
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => 1,
                        'total_transaksi_produk' => $produk->harga_produk,
                        'id_produk' => $storeData['produk_id'],
                        'id_transaksi' => $transaksi->id,
                    ]);

                    $transaksi->jumlah_transaksi_produk = $detail->total_transaksi_produk;
                    $transaksi->save();

                    // dd('masuk');
                    DB::commit();
                    return redirect()->to(url('catalog'));
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
                return redirect()->to(url('catalog'));
            }
        } else if ($callerId == '3') {
            // dd($storeData);
            $timestampPengambilan = strtotime($storeData['tanggal_pengambilan']);
            if ($timestampPengambilan < $timestampHariMax) {
                Session::flash('error', 'Pre-Order Tidak Boleh Kurang Dari 2 Hari Sejak Hari Ini');
                // dd(Session);
                // dd(Session::get('error'));
                return redirect()->to(url('catalog'));
            }
            DB::beginTransaction();
            try {
                // $produk = produk::where('id', $storeData['id'])->first();
                $produk = hampers::where('id', $storeData['hampers_id'])->first();
                // dd($produk);
                // dd($produk);
                $transaksiExist = transaksi::where('status_transaksi', 'di dalam keranjang(pre-order)')->first();
                // $testing = $storeData['hampers_id'];
                // dd($testing);
                if ($transaksiExist) {
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => $storeData['jumlah_produk'],
                        'total_transaksi_produk' => $storeData['jumlah_produk'] * $produk->harga_hampers,
                        'id_hampers' => $storeData['hampers_id'],
                        'id_transaksi' => $transaksiExist->id,
                    ]);

                    $transaksiExist->jumlah_transaksi_produk = $transaksiExist->jumlah_transaksi_produk + $detail->total_transaksi_produk;
                    $transaksiExist->save();
                    // dd($detail);
                    DB::commit();
                    return redirect()->to(url('catalog'));
                } else {
                    // dd('masuk');
                    $transaksi = transaksi::create([
                        // 'jumlah_transaksi_produk' => 
                        'jumlah_poin_transaksi' => 0,
                        'status_transaksi' => 'di dalam keranjang(pre-order)',
                        'tanggal_pesan' => $realHariIni,
                        'tanggal_ambil' => $storeData['tanggal_pengambilan'],
                        'id_customer' => $storeData['id_customer']
                    ]);
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => $storeData['jumlah_produk'],
                        'total_transaksi_produk' => $storeData['jumlah_produk'] * $produk->harga_hampers,
                        'id_hampers' => $storeData['hampers_id'],
                        'id_transaksi' => $transaksi->id,
                    ]);

                    $transaksi->jumlah_transaksi_produk = $detail->total_transaksi_produk;
                    $transaksi->save();
                    // dd('masuk');
                    DB::commit();
                    return redirect()->to(url('catalog'));
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
                return redirect()->to(url('catalog'));
            }
        } else {
            // dd($storeData);
            DB::beginTransaction();
            try {
                $produk = hampers::where('id', $storeData['produk_id'])->first();
                $transaksiExist = transaksi::where('status_transaksi', 'di dalam keranjang')->first();

                if ($transaksiExist) {
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => 1,
                        'total_transaksi_produk' => $produk->harga_hampers,
                        'id_hampers' => $storeData['produk_id'],
                        'id_transaksi' => $transaksiExist->id,
                    ]);
                    $transaksiExist->jumlah_transaksi_produk = $transaksiExist->jumlah_transaksi_produk + $detail->total_transaksi_produk;
                    $transaksiExist->save();
                    DB::commit();

                    return redirect()->to(url('catalog'));
                } else {

                    $transaksi = transaksi::create([
                        // 'jumlah_transaksi_produk' => 
                        'jumlah_poin_transaksi' => 0,
                        'status_transaksi' => 'di dalam keranjang',
                        'tanggal_pesan' => $realHariIni,
                        'tanggal_ambil' => $tanggalHariIni,
                        'id_customer' => $storeData['id_customer']
                    ]);
                    $detail = detail_transaksi::create([
                        'jumlah_produk' => 1,
                        'total_transaksi_produk' => $produk->harga_hampers,
                        'id_hampers' => $storeData['hampers_id'],
                        'id_transaksi' => $transaksi->id,
                    ]);

                    $transaksi->jumlah_transaksi_produk = $detail->total_transaksi_produk;
                    $transaksi->save();
                    // dd('masuk');
                    DB::commit();
                    return redirect()->to(url('catalog'));
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
                return redirect()->to(url('catalog'));
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = transaksi::find($id);
        $updateData = $request->all();
        dd($updateData);

        if ($request->hasFile('bukti_transaksi')) {
            $image = $updateData['bukti_transaksi'];
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            dd($updateData['bukti_transaksi']);
            $destinationPath = public_path('/public/images');
            $image->move($destinationPath, $image_name);
            $imagePath = '/public/images/' . $image_name;
            $updateData['bukti_transaksi'] = $imagePath;
        }
        // dd($updateData['bukti_transaksi']);
        $transaksi->bukti_transaksi = $updateData['bukti_transaksi'];
        $transaksi->status_transaksi = 'proses pembayaran';
        $transaksi->jumlah_transaksi_produk = $updateData['temp'];
        $transaksi->jumlah_poin_transaksi = $updateData['poin'];
        $customer = customer::where('id', $transaksi->id_customer)->first();
        $customer->poin_customer = 0;
        $customer->poin_customer += $updateData['poin'];
        $customer->save();


        if ($transaksi->save()) {
            // $detail = detail_transaksi::where('id_transaksi', $id)->first();
            // foreach(detail_transaksi::where('id_transaksi', $id)->first()){

            // }
            return redirect()->to(url('catalog'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id_produk = request()->input('id_produk');
        $id_transaksi = request()->input('id_transaksi');
        $detail = detail_transaksi::where('id_hampers', $id_produk)->where('id_transaksi', $id_transaksi)->first();
        // dd($detail);
        if (!$detail) {
            $detail = detail_transaksi::where('id_produk', $id_produk)->where('id_transaksi', $id_transaksi)->first();
            $transaksi = transaksi::where('id', $id_transaksi)->first();
            $transaksi->jumlah_transaksi_produk -= $transaksi->jumlah_transaksi_produk - $detail->total_transaksi_produk;
            $transaksi->save();
            DB::table('detail_transaksis')->where('id_transaksi', $id_transaksi)->where('id_produk', $id_produk)->delete();
            return redirect()->route('klontong');
        }
        $transaksi = transaksi::where('id', $id_transaksi)->first();
        $transaksi->jumlah_transaksi_produk -= $detail->total_transaksi_produk;
        $transaksi->save();
        DB::table('detail_transaksis')->where('id_transaksi', $id_transaksi)->where('id_hampers', $id_produk)->delete();
        // $detail->delete();
        return redirect()->route('klontong');
    }
}
