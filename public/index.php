<?php

require __DIR__.'/../vendor/autoload.php'; // Memuat autoloader Composer

$app = require_once __DIR__.'/../bootstrap/app.php'; // Memuat aplikasi Laravel

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); // Membuat kernel aplikasi

$request = Illuminate\Http\Request::capture(); // Mengambil request yang masuk

$response = $kernel->handle($request); // Menangani request dan mendapatkan response

$response->send(); // Mengirim response ke pengguna

$kernel->terminate($request, $response); // Menjalankan terminate hooks
