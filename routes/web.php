<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/stats', function () {
    return view('graph');
});

// Route::middleware(['auth.basic'])->get('/stats', function () {
//     return view('graph');
// });
