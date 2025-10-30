<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CdnController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});


Route::resource('cdns', CdnController::class);

Route::get('/', [CdnController::class, 'index']);

Route::resource('cdns', CdnController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])
     ->name('dashboard.index');


Route::post('/dashboard/check-status/{site}', [DashboardController::class, 'checkStatus'])
     ->name('dashboard.check-status');

