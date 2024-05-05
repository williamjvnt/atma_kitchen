<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\pengeluaran_lain;

class pengeluaranLainController extends Controller
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
            'jenis_pengeluaran' => 'required|max:60',
            'nominal_pengeluaran' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('pengeluaranLain.add')->withErrors($validate)->withInput();
        }
        $storeData['id_karyawan'] = 1;
        pengeluaran_lain::create($storeData);
        return redirect()->route('managePengeluaranLain');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $jenis_pengeluaran = $request->input('jenis_pengeluaran');
            if ($jenis_pengeluaran !== null) {
                $pengeluaran = pengeluaran_lain::where('jenis_pengeluaran', 'like', '%' . $jenis_pengeluaran . '%')->get();
                if ($pengeluaran->isNotEmpty()) {
                    return view('MO.managePengeluaranLain', ['pengeluaran' => $pengeluaran]);
                } else {
                    return view('MO.managePengeluaranLain')->with('error', 'Pengeluaran Lain Not Found');
                }
            } else {
                return view('MO.managePengeluaranLain')->with('error', 'Nama Pengeluaran Lain tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('MO.managePengeluaranLain')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengeluaran = pengeluaran_lain::find($id);
        if (is_null($pengeluaran)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'jenis_pengeluaran' => 'required|max:60',
            'nominal_pengeluaran' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }
        $pengeluaran->jenis_pengeluaran = $updateData['jenis_pengeluaran'];
        $pengeluaran->nominal_pengeluaran = $updateData['nominal_pengeluaran'];

        if ($pengeluaran->save()) {
            return redirect()->route('managePengeluaranLain');
        }

        return response([
            'message' => 'Update pengeluaran Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengeluaran = pengeluaran_lain::find($id);
        // dd($pengeluaran);
        if ($pengeluaran->delete()) {
            return redirect()->route('managePengeluaranLain');
        }
    }
}
