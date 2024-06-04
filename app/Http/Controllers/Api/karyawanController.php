<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\karyawan;
use App\Models\presensi;
use App\Models\role;
use Illuminate\Support\Facades\DB;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/employeeLogin');
    }

    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'nama_karyawan' => 'required|max:60',
            'alamat_karyawan' => 'required',
            'tanggal_lahir_karyawan' => 'required',
            'no_hp_karyawan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($storeData);
        $storeData['total_gaji'] = 0;
        $storeData['id_role'] = 3;
        DB::beginTransaction();
        try {
            $karyawan = karyawan::create($storeData);


            $presensi = presensi::create([

                'jumlah_presensi' => 0,
                'tanggal_presensi' => today(),
                'bonus_gaji' => 0
            ]);
            $karyawan->id_presensi = $presensi->id;
            $karyawan->save();


            DB::commit();
            return redirect()->route('manageKaryawan');
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->route('karyawan.add')->withErrors($validate)->withInput();
        }
        // $storeData['id_presensi'] = 0;
        // $storeData['id_presensi'] = $storeData['id'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $loginData = $request->all();
        $validate = Validator::make($loginData, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = karyawan::where('username', $request->username)->first();

        // dd('masuk');
        if ($user && $user->password === $request->password) {
            if ($user->id_role === 1 || $user->id_role === 2 || $user->id_role === 10) {
                Session::put('active_karyawan_id', $user->nama_karyawan);
                if ($user->id === 1) {
                    return redirect()->route('dashboardMO');
                } else if ($user->id === 2) {
                    return redirect()->route('dashboardAdmin');
                } else {
                    return redirect()->route('dashboardOwner');
                }
            } else {

                Session::flash('error', 'Anda bukan Admin atau MO!');
                return response(['message' => $validate->errors()], 400);
            }
        } else {
            Session::flash('error', 'Username atau Password salah!');
            return response(['message' => 'Invalid Credential'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $nama_karyawan = $request->input('nama_karyawan');
            if ($nama_karyawan !== null) {

                $karyawan = karyawan::where('nama_karyawan', 'like', '%' . $nama_karyawan . '%')->get();
                if ($karyawan->isNotEmpty()) {
                    // dd($bahan_baku);
                    return view('MO.manageKaryawan', ['karyawan' => $karyawan]);
                } else {
                    return view('MO.manageKaryawan')->with('error', 'karyawan Not Found');
                }
            } else {
                return view('MO.manageKaryawan')->with('error', 'Nama karyawan tidak boleh kosong');
            }
        } catch (\Exception $e) {
            return view('MO..manageKaryawan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = karyawan::find($id);
        if (is_null($karyawan)) {
            return response([
                'message' => 'Karyawan Not Found',
                'data' => null
            ], 404);
        }
        $updateData = $request->all();

        $karyawan->update($updateData);
        return redirect()->route('manageKaryawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = karyawan::find($id);
        if (is_null($karyawan)) {
            return response([
                'message' => 'Bahan baku Not Found',
                'data' => null
            ], 404);
        }

        if ($karyawan->delete()) {
            return redirect()->route('manageKaryawan');
        }

        return response([
            'message' => 'Delete Bahan baku Failed',
            'data' => null
        ], 400);
    }
}
