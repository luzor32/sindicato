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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->string('numero_afiliado')->unique();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('dni', 8)->unique();
            $table->string('cuil', 11)->unique();
            $table->string('nacionalidad');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('empresa');
            $table->string('foto_dni')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });

        Schema::table('afiliados', function (Blueprint $table) {
        $table->dropColumn('estado');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');

         Schema::table('afiliados', function (Blueprint $table) {
        $table->string('estado')->nullable();
    });
    }
};
