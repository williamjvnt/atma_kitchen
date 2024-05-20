<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\MailSend;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }



    public function register(Request $request)
    {
        $registrationData = $request->all();
        $str = Str::random(100);
        $validate = Validator::make($registrationData, [
            'nama_customer' => 'required|max:60',
            'no_telepon_customer' => 'required|regex:/^08\d{9,11}$/',
            'username' => 'required|max:60',
            'password' => 'required|string|min:8',
            'email_customer' => 'required|email:rfc, dns|unique:customers',
            'tanggal_lahir_customer' => 'required|date',

        ]);

        if ($validate->fails()) {
            // dd($validate->errors());
            return redirect('/register')->withErrors($validate)->withInput();
        }

        $registrationData['status'] = 0;
        $registrationData['password'] = bcrypt($request->password);
        $registrationData['poin_customer'] = 0;
        $registrationData['jumlah_saldo'] = 0;
        $registrationData['verify_key'] = $str;
        customer::create($registrationData);
        $details = [
            'email' => $request->email_customer,
            'username' => $request->username,
            'website' => 'Atma Kitchen',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost() . '/register/verify/' . $str
        ];
        Mail::to($request->email_customer)->send(new MailSend($details));
        // $customer = customer::create($registrationData);
        Session::flash('message', 'Link verifikasi telah dikirim ke email anda. Silahkan cek email anda untuk mengaktifkan akun.');
        return redirect('/register');
    }
    public function verify($verify_key)
    {
        $keyCheck = customer::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $customer = customer::where('verify_key', $verify_key)->update(['status' => 1]);
            return "Verifikasi Berhasil";
        } else {
            return "Key tidak valid.";
        }
    }
    public function login(Request $request)
    {
        $loginData = $request->except('_token');
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
        session()->regenerate();
        // Pengguna berhasil diotentikasi
        /** @var \App\Models\customer $user **/
        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;
        // dd($user);
        // dd(Auth::user());


        // dd(Auth::guard('web')->check());
        // dd($user->active);
        if ($user->status && Auth::check()) {
            return redirect()->intended('home')->with(['user' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
        } else {
            // Jika pengguna belum diverifikasi
            Session::flash('error', 'Akun Anda Belum diverifikasi. Silahkan cek email Anda.');
            return view('customer.loginCust');
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



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
