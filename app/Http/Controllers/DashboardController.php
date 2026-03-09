<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // Afiliados activos (aprobados y activos)
        $totalAfiliados = Afiliado::where('estado_solicitud', 'aprobado')
            ->where('estado_afiliado', 'activo')
            ->count();

        // Solicitudes por estado
        $pendientes = Afiliado::where('estado_solicitud', 'pendiente')->count();

        $aprobadas = Afiliado::where('estado_solicitud', 'aprobado')->count();

        $rechazadas = Afiliado::where('estado_solicitud', 'rechazado')->count();

        // Total de solicitudes
        $totalSolicitudes = $pendientes + $aprobadas + $rechazadas;

        // Solicitudes por mes (para gráfico)
        $solicitudesMes = Afiliado::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('count(*) as total')
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total','mes');

        return view('dashboard', compact(
            'totalAfiliados',
            'pendientes',
            'aprobadas',
            'rechazadas',
            'totalSolicitudes',
            'solicitudesMes'
        ));
    }
}