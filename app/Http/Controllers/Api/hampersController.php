<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hampers;
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
            'nama_hampers' => 'required|max:60',
            'harga_hampers' => 'required',
            'id_bahan_baku' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $content = hampers::create($storeData);
        return response([
            'message' => 'Add Hampers Success',
            'data' => $content
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hampers = hampers::find($id);

        if (!is_null($hampers)) {
            return response([
                'message' => 'Hampers found, it is ' . $hampers->title,
                'data' => $hampers
            ], 200);
        }

        return response([
            'message' => 'Hampers Not Found',
            'data' => null
        ], 404);
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
            'id_bahan_baku' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $hampers->nama_hampers = $updateData['nama_hampers'];
        $hampers->harga_hampers = $updateData['harga_hampers'];
        $hampers->id_bahan_baku = $updateData['id_bahan_baku'];

        if ($hampers->save()) {
            return response([
                'message' => 'Update Hampers Success',
                'data' => $hampers
            ], 200);
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
            return response([
                'message' => 'Delete Hampers Success',
                'data' => $hampers
            ], 200);
        }

        return response([
            'message' => 'Delete Hampers Failed',
            'data' => null
        ], 400);
    }
}
