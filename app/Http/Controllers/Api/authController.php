<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/employeeLogin');
    }

    public function register(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $registrationData = $request->all();

        $validate = Validator::make($registrationData, [
            'nama_customer' => 'required|max:60',
            'no_telepon_customer' => 'required|regex:/^08\d{9,11}$/',
            'email_customer' => 'required|email:rfc, dns|unique:customers',
            'username' => 'required|max:60',
            'password' => 'required|string|min:8',
            'tanggal_lahir_customer' => 'required|date',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $registrationData['status'] = 0;
        $registrationData['password'] = bcrypt($request->password);
        $registrationData['poin_customer'] = 0;
        $registrationData['jumlah_saldo'] = 0;

        $customer = customer::create($registrationData);

        return response([
            'message' => 'Register Success',
            'user' => $customer
        ], 200);
    }

    public function login(Request $request)
    {
        $loginData = $request->all();
        $validate = Validator::make($loginData, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }


        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Invalid Credential'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Authentiucation Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
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
