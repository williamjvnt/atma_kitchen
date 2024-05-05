<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;


class KaryawanController extends Controller
{
    public function index()
    {
        return view('/employeeLogin');
    }

    public function actionLoginEmployee(Request $request)
    {
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
                return redirect('loginEmployee');
            }
        } else {

            Session::flash('error', 'Username atau Password salah!');
            return redirect('loginEmployee');
        }
    }

    
    public function actionLogout(Request $request)
    {

        return redirect('loginEmployee');
    }
}
