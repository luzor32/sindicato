<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
      
    $afiliadosActivos = Afiliado::where('estado_solicitud','aprobado')
        ->where('estado_afiliado','activo')
        ->latest()
        ->limit(10)
        ->get();

    return view('dashboard', compact('afiliadosActivos'));
        
    }
}