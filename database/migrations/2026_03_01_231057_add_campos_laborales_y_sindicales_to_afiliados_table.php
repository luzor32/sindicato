<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
     Schema::table('afiliados', function (Blueprint $table) {

        // =========================
        // DATOS LABORALES
        // =========================
        $table->string('puesto')->nullable()->after('empresa');
        $table->string('seccion')->nullable()->after('puesto');
        $table->string('tipo_contrato')->nullable()->after('seccion');
        $table->string('jornada_laboral')->nullable()->after('tipo_contrato');

        // =========================
        // DATOS SINDICALES
        // =========================
        $table->date('fecha_afiliacion')->nullable()->after('jornada_laboral');
        $table->string('delegacion_sindical')->nullable()->after('fecha_afiliacion');

        // =========================
        // DOMICILIO (EXTENSIÓN)
        // =========================
        $table->string('provincia')->nullable()->after('numero');
        $table->string('codigo_postal')->nullable()->after('provincia');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('afiliados', function (Blueprint $table) {

            $table->dropColumn([
                'puesto',
                'seccion',
                'tipo_contrato',
                'jornada_laboral',
                'fecha_afiliacion',
                'delegacion_sindical',
                'provincia',
                'codigo_postal'
            ]);

        });
    }
};
