<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('navbarDashboard');
});

Route::resource('login', App\Http\Controllers\CustomerController::class);
Route::resource('loginEmployee', App\Http\Controllers\KaryawanController::class);
Route::post('dashboardEmployee', [KaryawanController::class, 'actionLoginEmployee'])->name('actionLoginEmployee');
Route::get('dashboardAdmin', function () {
    return view('/admin/navbarAdminDashboard');
})->name('dashboardAdmin');
