<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePassCustController;
use App\Http\Controllers\searchController;

Route::get('/', function () {
    return view('/admin/navbarAdminDashboard');
});

Route::post('/MailSend', [ChangePassCustController::class, 'sendEmailCust']);

Route::post('/cariDataCustomer', [searchController::class, 'search']);

Route::get('/showHistoryPesanan', [HistoryPesananController::class], 'show');
