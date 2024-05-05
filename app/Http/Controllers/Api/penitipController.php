<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penitip;
use Illuminate\Support\Facades\Validator;

class penitipController extends Controller
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
            'nama_penitip' => 'required|max:60',
            'tanggal_menitip' => 'required|date',
        ]);

        if ($validate->fails()) {
            return redirect()->route('penitip.add')->withErrors($validate)->withInput();
        }
        // dd($storeData);
        penitip::create($storeData);
        return redirect()->route('managePenitip');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            // dd($request);
            $nama_penitip = $request->input('nama_penitip');
            // dd($nama_penitip);
            if ($nama_penitip !== null) {
                $penitip = penitip::where('nama_penitip', 'like', '%' . $nama_penitip . '%')->get();
                if ($penitip->isNotEmpty()) {
                    return view('MO.managePenitip', ['penitip' => $penitip]);
                } else {
                    return view('MO.managePenitip')->with('error', 'Penitip Not Found');
                }
            } else {
                return view('MO.managePenitip')->with('error', 'Nama Penitip tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('MO.managePenitip')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penitip = penitip::find($id);
        if (is_null($penitip)) {
            return view('MO.managePenitip')->with('error', 'Penitip Not Found');
        }
        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_penitip' => 'required|max:60',
            'tanggal_menitip' => 'required|date',
        ]);

        if ($validate->fails()) {
            return redirect()->route('penitip.edit', $id)->withErrors($validate)->withInput();
        }
        $penitip->nama_penitip = $updateData['nama_penitip'];
        $penitip->tanggal_menitip = $updateData['tanggal_menitip'];
        if ($penitip->save()) {
            return redirect()->route('managePenitip');
        }
        return response([
            'message' => 'Update Penitip Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penitip = penitip::find($id);

        if (is_null($penitip)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        if ($penitip->delete()) {
            return redirect()->route('managePenitip');
        }

        return response([
            'message' => 'Delete Penitip Failed',
            'data' => null
        ], 400);
    }
}
