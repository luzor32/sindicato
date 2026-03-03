<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
         DB::table('afiliados')
        ->where('estado', 'activo')
        ->update([
            'estado_solicitud' => 'aprobado',
            'estado_afiliado' => 'activo'
        ]);

        DB::table('afiliados')
            ->where('estado', 'suspendido')
            ->update([
                'estado_solicitud' => 'aprobado',
                'estado_afiliado' => 'suspendido'
            ]);

        DB::table('afiliados')
            ->where('estado', 'baja')
            ->update([
                'estado_solicitud' => 'aprobado',
                'estado_afiliado' => 'baja'
            ]);

        DB::table('afiliados')
            ->where('estado', 'pendiente')
            ->update([
                'estado_solicitud' => 'pendiente'
            ]);

        DB::table('afiliados')
            ->where('estado', 'rechazado')
            ->update([
                'estado_solicitud' => 'rechazado'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
