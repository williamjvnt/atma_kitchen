<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;

class ChangePassCustController extends Controller{
    public function sendEmailCust(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if(!customer){
            return response()->json(['error' => 'Alamat email tidak terdaftar!'], 404);
        }

        $token = Str::random(60);
        $customer->reset_password_token = $token;
        $customer->save();

        Mail::to($customer->email)->send(new mailTemplate($customer));

        return response()->json(['message' => 'Email telah dikirim, silakan cek email Anda!'], 200);
    }
}