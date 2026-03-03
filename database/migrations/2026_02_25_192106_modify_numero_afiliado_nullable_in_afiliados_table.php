<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('afiliados', function (Blueprint $table) {

            // eliminar índice unique existente
            $table->dropUnique('afiliados_numero_afiliado_unique');

            // modificar columna
            $table->string('numero_afiliado')->nullable()->change();

            // volver a crear el índice unique
            $table->unique('numero_afiliado', 'afiliados_numero_afiliado_unique');
        });
    }

    public function down()
    {
        Schema::table('afiliados', function (Blueprint $table) {

            $table->dropUnique('afiliados_numero_afiliado_unique');

            $table->string('numero_afiliado')->nullable(false)->change();

            $table->unique('numero_afiliado', 'afiliados_numero_afiliado_unique');
        });
    }
};
