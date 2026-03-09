<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('afiliados', AfiliadoController::class);
Route::post('/afiliados/{afiliado}/aprobar',
    [AfiliadoController::class, 'aprobar'])
    ->name('afiliados.aprobar');
