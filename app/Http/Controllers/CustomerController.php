<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;

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

        // dd(Auth::check());
        if (Auth::check()) {
            return redirect("home");
        } else {
            return view("homePage");
        }
    }

    public function actionLogout()
    {
        dd(Auth::check());
        Auth::logout();
        return redirect("/");
    }
}
