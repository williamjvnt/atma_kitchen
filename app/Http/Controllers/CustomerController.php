<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        return view('/customer/loginCust');
    }

    public function register()
    {
        return view('register');
    }

    // public function login()
    // {
    //     if (Auth::check()) {
    //         return redirect("home");
    //     } else {
    //         return view('homePage');
    //     }
    // }
    public function loginSuccess()
    {

        $produk = Produk::all();

        if (Auth::check()) {
            return redirect("home");
        } else {
            return view("homePage", compact('produk'));
        }
    }

    public function actionLogout()
    {
        // dd(Auth::check());
        Auth::logout();
        return redirect("/");
    }

    public function login(Request $request)
    {
        // dd('masuk');
        $loginData = $request->except(['_token']);
        $validate = Validator::make($loginData, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            Session::flash('error', 'Username atau Password Tidak Boleh Kosong');
            return view('/customer/loginCust');
        }

        if (!Auth::attempt($loginData)) {
            Session::flash('error', 'Username atau Password salah');
            return view('/customer/loginCust');
        }
        // session()->regenerate();
        // Pengguna berhasil diotentikasi
        /** @var \App\Models\customer $user **/
        $user = Auth::user();
        // $token = $user->createToken('Authentication Token')->accessToken;
        // dd($user);
        // dd(Auth::user());


        // dd(Auth::guard('web')->check());
        // dd($user->active);
        if ($user->status) {
            return redirect()->route('home');
        } else {
            // Jika pengguna belum diverifikasi
            Session::flash('error', 'Akun Anda Belum diverifikasi. Silahkan cek email Anda.');
            return redirect('/');
        }
        // if (Auth::check()) {
        //     // dd(Auth::check());
        //     return redirect('home')->with(['user' => $user, 'token' => $token]);
        // } else {
        //     // Jika tidak, lakukan sesuatu yang sesuai, seperti menampilkan pesan kesalahan
        //     Session::flash('error', 'Autentikasi gagal.');
        //     return view('/customer/loginCust');
        // }
    }
}
