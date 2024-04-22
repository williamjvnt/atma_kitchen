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
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),

        ];
        $user = karyawan::where('username', $request->username)->first();

        if ($user && $user->password === $request->password) {
            return redirect()->route('dashboardAdmin');
        } else {

            Session::flash('error', 'Username atau Password salah!');
            return redirect('loginEmployee');
        }
    }


    public function actionLogout(Request $request)
    {
    }
}
