<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\resep;
use App\Models\resep_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class resepController extends Controller
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
        //dd($storeData);
        $validate = Validator::make($storeData, [
            'nama_resep' => 'required|max:60',
            'id_produk' => 'required',
        ]);
        // dd($storeData);
        if ($validate->fails()) {
            // dd($validate->errors());
            return redirect()->route('resep.add')->withErrors($validate)->withInput();
        }
        // dd('masuk');
        resep_produk::create($storeData);
        return redirect()->route('manageResep');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $nama_resep = $request->input('nama_resep');
            // dd($nama_resep);
            if ($nama_resep !== null) {
                // dd('masuk');
                $resep = resep_produk::where('nama_resep', 'like', '%' . $nama_resep . '%')->get();
                if ($resep->isNotEmpty()) {
                    return view('admin.manageResep', ['resep' => $resep]);
                } else {
                    return view('admin.manageResep')->with('error', 'resep Not Found');
                }
            } else {
                return view('admin.manageResep')->with('error', 'Nama resep tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('admin.manageResep')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resep = resep_produk::find($id);
        if (is_null($resep)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_resep' => 'required|max:60',
            'id_produk' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('resep.add')->withErrors($validate)->withInput();
        }

        $resep->nama_resep = $updateData['nama_resep'];
        $resep->id_produk = $updateData['id_produk'];
        if ($resep->save()) {
            return redirect()->route('manageResep');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resep = resep_produk::find($id);

        if (is_null($resep)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        if ($resep->delete()) {
            return redirect()->route('manageResep');
        }

        return response([
            'message' => 'Delete Product Failed',
            'data' => null
        ], 400);
    }
}
