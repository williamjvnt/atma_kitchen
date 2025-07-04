<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\hampers;
use App\Models\detail_hampers;
use App\Models\produk;
use Illuminate\Support\Facades\Validator;

class hampersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hampers = hampers::all();
        if (count($hampers) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $hampers
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
            'nama_hampers' => 'required|string|max:255',
            'harga_hampers' => 'required',

        ]);

        DB::beginTransaction();
        try {

            if ($request->hasFile('gambar_hampers')) {
                $image = $storeData['gambar_hampers'];
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/public/images');
                $image->move($destinationPath, $image_name);
                $imagePath = '/public/images/' . $image_name;
                $storeData['gambar_hampers'] = $imagePath;
            }
            $hampers = hampers::create([
                'nama_hampers' => $storeData['nama_hampers'],
                'harga_hampers' => $storeData['harga_hampers'],
                'gambar_hampers' => $storeData['gambar_hampers'],
                'id_bahan_baku' => 1,
            ]);
            // dd('masuk');
            $produk = $storeData['id_produk'];
            // dd($produk);
            foreach ($produk as $id_produk) {
                detail_hampers::create([
                    'id_hampers' => $hampers->id,
                    'id_produk' => $id_produk,
                ]);
            }

            DB::commit();
            return redirect()->route('manageHampers');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('hampers.add')->withErrors($validate)->withInput();
        }
        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }
        // $storeData['id_bahan_baku'] = 1;
        // hampers::create($storeData);
        // return redirect()->route('manageHampers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $nama_hampers = $request->input('nama_hampers');
            if ($nama_hampers !== null) {
                $hampers = Hampers::where('nama_hampers', 'like', '%' . $nama_hampers . '%')->get();
                if ($hampers->isNotEmpty()) {
                    return view('admin.manageHampers', ['hampers' => $hampers]);
                } else {
                    return view('admin.manageHampers')->with('error', 'hampers Not Found');
                }
            } else {
                return view('admin.manageHampers')->with('error', 'Nama hampers tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('admin.manageHampers')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hampers = hampers::find($id);
        if (is_null($hampers)) {
            return response([
                'message' => 'Hampers Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_hampers' => 'required|max:60',
            'harga_hampers' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }
        if ($request->hasFile('gambar_hampers')) {
            $image = $updateData['gambar_hampers'];
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/public/images');
            $image->move($destinationPath, $image_name);
            $imagePath = '/public/images/' . $image_name;
            $updateData['gambar_hampers'] = $imagePath;
        }

        $hampers->nama_hampers = $updateData['nama_hampers'];
        $hampers->harga_hampers = $updateData['harga_hampers'];
        $hampers->gambar_hampers = $updateData['gambar_hampers'];
        if ($hampers->save()) {
            return redirect()->route('manageHampers');
        }

        return response([
            'message' => 'Update Hampers Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hampers = hampers::find($id);

        if (is_null($hampers)) {
            return response([
                'message' => 'Hampers Not Found',
                'data' => null
            ], 404);
        }

        if ($hampers->delete()) {
            return redirect()->route('manageHampers');
        }

        return response([
            'message' => 'Delete Hampers Failed',
            'data' => null
        ], 400);
    }
}
