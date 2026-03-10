<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CargaFamiliarController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('afiliados', AfiliadoController::class);
Route::post('/afiliados/{afiliado}/aprobar',
    [AfiliadoController::class, 'aprobar'])
    ->name('afiliados.aprobar');



Route::get('/carga_familiar/{afiliado_id}',
    [CargaFamiliarController::class,'create'])
    ->name('carga_familiar.create');

Route::post('/carga_familiar',
    [CargaFamiliarController::class,'store'])
    ->name('carga_familiar.store');    

Route::get('/carga-familiar/ver/{afiliado_id}',
    [CargaFamiliarController::class,'show'])
    ->name('carga_familiar.show');

Route::get('/carga-familiar/editar/{id}',
    [CargaFamiliarController::class,'edit'])
    ->name('carga_familiar.edit');  
    
Route::put('/carga-familiar/{id}',
    [CargaFamiliarController::class,'update'])
    ->name('carga_familiar.update');

Route::get('/carga-familiar/detalle/{id}',
    [CargaFamiliarController::class,'detalle'])
    ->name('carga_familiar.detalle');

Route::delete('/carga-familiar/{id}',
    [CargaFamiliarController::class,'destroy'])
    ->name('carga_familiar.destroy');    