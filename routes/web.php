<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePassCustController;
use App\Http\Controllers\searchController;

Route::get('/', function () {
    return view('/admin/navbarAdminDashboard');
});

Route::post('/send-change-link', [ChangePassCustController::class, 'sendEmailCust']);

Route::post('/search', [searchController::class, 'search']);