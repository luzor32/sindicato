<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('afiliados', AfiliadoController::class);
Route::post('/afiliados/{afiliado}/aprobar',
    [App\Http\Controllers\AfiliadoController::class, 'aprobar'])
    ->name('afiliados.aprobar');
