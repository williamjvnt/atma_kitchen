<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class HistoryPesananController extends Controller
{
    public function show()
    {
        $transactions = Transaction::all();
        return view('showHistoryPesanan', ['transactions' => $transactions]);
    }
}