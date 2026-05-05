<?php

use App\Http\Controllers\JokeController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/jokes', [JokeController::class, 'getJokes']);

Route::get('/visits', [VisitController::class, 'getVisits']);
Route::post('/visits', [VisitController::class, 'saveVisit']);
