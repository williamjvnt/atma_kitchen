<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bahan_baku;
use Illuminate\Support\Facades\Validator;

class bahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan_baku = bahan_baku::all();
        if (count($bahan_baku) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $bahan_baku
            ], 200);
        }
        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'nama_bahan_baku' => 'required|max:60',
            'stok_bahan_baku' => 'required',
            'min_stok_bahan_baku' => 'required',
            'satuan_bahan_baku' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('bahanbaku.add')->withErrors($validate)->withInput();
        }

        $bahan_baku = bahan_baku::create($storeData);
        return redirect()->route('manageBahanbaku');
    }

    /**
     * Display the specified resource.
     */
    public function show(request $request)
    {
        try {
            $nama_bahan_baku = $request->input('nama_bahan_baku');
            if ($nama_bahan_baku !== null) {

                $bahan = bahan_baku::where('nama_bahan_baku', 'like', '%' . $nama_bahan_baku . '%')->get();
                if ($bahan->isNotEmpty()) {
                    // dd($bahan_baku);
                    return view('admin.manageBahanbaku', ['bahan' => $bahan]);
                } else {
                    return view('admin.manageBahanbaku')->with('error', 'Bahan baku Not Found');
                }
            } else {
                return view('admin.manageBahanbaku')->with('error', 'Nama Bahan baku tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('admin.manageBahanbaku')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bahan_baku = bahan_baku::find($id);
        if (is_null($bahan_baku)) {
            return response([
                'message' => 'Bahan Baku Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_bahan_baku' => 'required|max:60',
            'stok_bahan_baku' => 'required',
            'min_stok_bahan_baku' => 'required',
            'satuan_bahan_baku' => 'required',
        ]);
        // dd($updateData);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $bahan_baku->nama_bahan_baku = $updateData['nama_bahan_baku'];
        $bahan_baku->stok_bahan_baku = $updateData['stok_bahan_baku'];
        $bahan_baku->min_stok_bahan_baku = $updateData['min_stok_bahan_baku'];
        $bahan_baku->satuan_bahan_baku = $updateData['satuan_bahan_baku'];

        if ($bahan_baku->save()) {
            return redirect()->route('manageBahanbaku');
        }

        return response([
            'message' => 'Update Bahan Baku Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bahan_baku = bahan_baku::find($id);

        if (is_null($bahan_baku)) {
            return response([
                'message' => 'Bahan baku Not Found',
                'data' => null
            ], 404);
        }

        if ($bahan_baku->delete()) {
            return redirect()->route('manageBahanbaku');
        }

        return response([
            'message' => 'Delete Bahan baku Failed',
            'data' => null
        ], 400);
    }
}
