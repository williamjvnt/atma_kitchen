<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\karyawan;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/employeeLogin');
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

        if ($user && $user->password === $request->password) {
            if ($user->id === 1 || $user->id === 2) {
                Session::put('active_karyawan_id', $user->nama_karyawan);
                if ($user->id === 1) {
                    return redirect()->route('dashboardMO');
                } else {

                    return redirect()->route('dashboardAdmin');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
