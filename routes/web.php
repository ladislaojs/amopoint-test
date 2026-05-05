<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'ip_api_endpoint' => config('app.api_urls.ip'),
    ]);
});

Route::middleware(['auth.custom_basic'])->get('/stats', function () {
    return view('graph');
});
