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
        Schema::create('carga_familiars', function (Blueprint $table) {
             $table->id();

            $table->foreignId('afiliado_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('nombre');
            $table->string('apellido');

            $table->string('dni')->nullable();

            $table->string('parentesco');

            $table->boolean('es_hijo')->default(false);

            $table->boolean('estudia')->default(false);

            $table->boolean('discapacidad')->default(false);

            $table->date('fecha_nacimiento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_familiars');
    }
};
