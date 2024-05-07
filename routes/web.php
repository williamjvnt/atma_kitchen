<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePassCustController;

Route::get('/', function () {
    return view('/admin/navbarAdminDashboard');
});

Route::post('/send-change-link', [ChangePassCustController::class, 'sendEmailCust']);