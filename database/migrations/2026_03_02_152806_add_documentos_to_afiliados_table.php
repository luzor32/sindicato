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
        Schema::table('afiliados', function (Blueprint $table) {
            //
             $table->string('recibo_sueldo')->nullable()->after('foto_dni_dorso');
            $table->string('certificado_trabajo')->nullable()->after('recibo_sueldo');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            //
             $table->dropColumn([
                'recibo_sueldo',
                'certificado_trabajo'
            ]);    
        });
    }
};
