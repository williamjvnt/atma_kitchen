<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\detail_pengadaan;
use App\Models\pengadaan_bahan_baku;
use App\Models\bahan_baku;
use Illuminate\Support\Facades\DB;

class detailPengadaanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'tanggal_pengadaan' => 'required|date',
            'harga_bahan_baku' => 'required',
            'jumlah_detail_pengadaan' => 'required',
            'nama_bahan_baku' => 'required',
        ]);

        if ($validate->fails()) {

            return redirect()->route('pengadaan.add')->withErrors($validate)->withInput();
        }
        $storeData['id_karyawan'] = 1;
        //dd($storeData);
        DB::beginTransaction();
        try {
            $pengadaan = pengadaan_bahan_baku::create([
                'tanggal_pengadaan' => $storeData['tanggal_pengadaan'],
                'harga_bahan_baku' => $storeData['harga_bahan_baku'],
                'id_karyawan' => $storeData['id_karyawan'],
            ]);
            //dd($pengadaan);
            $id_bahan = bahan_baku::where('nama_bahan_baku', $storeData['nama_bahan_baku'])->first();
            $subtotal = $storeData['harga_bahan_baku'] * $storeData['jumlah_detail_pengadaan'];


            detail_pengadaan::create([
                'jumlah_detail_pengadaan' => $storeData['jumlah_detail_pengadaan'],
                'subTotal_detail_pengadaan' => $subtotal,
                'id_pengadaan' => $pengadaan->id,
                'id_bahan_baku' => $id_bahan->id,

            ]);


            DB::commit();
            return redirect()->route('managePengadaan');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->route('pengadaan.add')->withErrors($validate)->withInput();
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
    public function update(Request $request, $id)
    {
        $updateData = $request->all();
        //dd($updateData);
        // Validasi data
        $validate = Validator::make($updateData, [
            'harga_bahan_baku' => 'required',
            'jumlah_detail_pengadaan' => 'required',
            'nama_bahan_baku' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('pengadaan.edit', $id)->withErrors($validate)->withInput();
        }

        DB::beginTransaction();
        try {
            $pengadaan = pengadaan_bahan_baku::findOrFail($id);

            //dd($id);
            $pengadaan->harga_bahan_baku = $updateData['harga_bahan_baku'];
            $pengadaan->save();
            // dd($updateData['nama_bahan_baku']);
            $id_bahan = bahan_baku::find($updateData['nama_bahan_baku']);
            // dd($idBahanBaku);
            $subtotal = $updateData['harga_bahan_baku'] * $updateData['jumlah_detail_pengadaan'];
            // dd('masuk');
            $detail_pengadaan = detail_pengadaan::where('id_pengadaan', $id)->first();

            $detail_pengadaan->update([
                'id_bahan_baku' => $id_bahan->id,
                'subTotal_detail_pengadaan' => $subtotal,
                'jumlah_detail_pengadaan' => $updateData['jumlah_detail_pengadaan'],
            ]);

            // dd($detail_pengadaan);
            // dd($updateData['jumlah_detail_pengadaan']);
            // $detail_pengadaan->save();


            DB::commit();

            return redirect()->route('managePengadaan')->with('success', 'Pengadaan berhasil diperbarui');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->route('pengadaan.edit', $id)->withErrors(['error' => 'Gagal memperbarui pengadaan'])->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
