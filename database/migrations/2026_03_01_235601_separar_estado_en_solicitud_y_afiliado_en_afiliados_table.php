<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('afiliados', function (Blueprint $table) {

        // Nuevo campo: estado del proceso
        $table->string('estado_solicitud')
              ->default('pendiente')
              ->after('estado');

        // Nuevo campo: estado sindical real
        $table->string('estado_afiliado')
              ->nullable()
              ->after('estado_solicitud');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('afiliados', function (Blueprint $table) {

        $table->dropColumn([
            'estado_solicitud',
            'estado_afiliado'
        ]);

        });
    }
};
