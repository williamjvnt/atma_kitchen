<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pengadaan_bahan_baku;

class pengadaanBahanBakuController extends Controller
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

        $validate = Validator::make($storeData, [
            'tanggal_pengadaan' => 'required|date',
            'harga_bahan_baku' => 'required',
            //'type' => 'required|in:Free,Paid',
        ]);

        if ($validate->fails()) {
            return redirect()->route('pengadaan.add')->withErrors($validate)->withInput();
        }
        $storeData['id_karyawan'] = 1;
        pengadaan_bahan_baku::create($storeData);
        return redirect()->route('managePengadaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $tanggal_pengadaan = $request->input('tanggal_pengadaan');
            if ($tanggal_pengadaan !== null) {
                $pengadaan = pengadaan_bahan_baku::where('tanggal_pengadaan', 'like', '%' . $tanggal_pengadaan . '%')->get();
                if ($pengadaan->isNotEmpty()) {
                    //dd($pengadaan);
                    return view('MO.managePengadaan', ['pengadaan' => $pengadaan]);
                } else {
                    return view('MO.managePengadaan')->with('error', 'pengadaan Not Found');
                }
            } else {
                return view('MO.managePengadaan')->with('error', 'Nama pengadaan tidak boleh kosong');
            }
        } catch (\Exception $e) {

            return view('MO.managePengadaan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengadaan = pengadaan_bahan_baku::find($id);
        if (is_null($pengadaan)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'tanggal_pengadaan' => 'required|date',
            'harga_bahan_baku' => 'required',
            //'type' => 'required|in:Free,Paid',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $pengadaan->tannggal_pengadaan = $updateData['tannggal_pengadaan'];
        $pengadaan->harga_bahan_baku = $updateData['harga_bahan_baku'];


        if ($pengadaan->save()) {
            return redirect()->route('managePengadaan');
        }

        return response([
            'message' => 'Update data Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengadaan = pengadaan_bahan_baku::find($id);

        if (is_null($pengadaan)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        if ($pengadaan->delete()) {
            return redirect()->route('managePengadaan');
        }

        return response([
            'message' => 'Delete Data Failed',
            'data' => null
        ], 400);
    }
}
