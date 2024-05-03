<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\Validator;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        if (count($produk) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $produk
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
            'nama_produk' => 'required|max:60',
            'harga_produk' => 'required',
            'satuan_produk' => 'required',
            'stok_produk' => 'required',
            'id_kategori' => 'required',
            'id_penitip' => 'nullable',
            //'type' => 'required|in:Free,Paid',
        ]);

        if ($validate->fails()) {
            return redirect()->route('produk.add')->withErrors($validate)->withInput();
        }
        // dd($storeData['harga_produk']);
        produk::create($storeData);
        return redirect()->route('manageProduk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $nama_produk = $request->input('nama_produk');
            if ($nama_produk !== null) {
                $produk = Produk::where('nama_produk', 'like', '%' . $nama_produk . '%')->get();
                if ($produk->isNotEmpty()) {
                    return view('admin.manageProduk', ['produk' => $produk]);
                } else {
                    return view('admin.manageProduk')->with('error', 'Produk Not Found');
                }
            } else {
                return view('admin.manageProduk')->with('error', 'Nama produk tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('admin.manageProduk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = produk::find($id);
        if (is_null($produk)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_produk' => 'required|max:60',
            'harga_produk' => 'required',
            'satuan_produk' => 'required',
            'stok_produk' => 'required',
            'id_kategori' => 'required',
            'id_penitip' => 'nullable',
        ]);
        //dd($updateData);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $produk->nama_produk = $updateData['nama_produk'];
        $produk->harga_produk = $updateData['harga_produk'];
        $produk->satuan_produk = $updateData['satuan_produk'];
        $produk->stok_produk = $updateData['stok_produk'];
        $produk->id_kategori = $updateData['id_kategori'];
        $produk->id_penitip = $updateData['id_penitip'];


        if ($produk->save()) {
            return redirect()->route('manageProduk');
        }

        return response([
            'message' => 'Update Product Failed',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::find($id);

        if (is_null($produk)) {
            return response([
                'message' => 'Product Not Found',
                'data' => null
            ], 404);
        }

        if ($produk->delete()) {
            return redirect()->route('manageProduk');
        }

        return response([
            'message' => 'Delete Product Failed',
            'data' => null
        ], 400);
    }
}
