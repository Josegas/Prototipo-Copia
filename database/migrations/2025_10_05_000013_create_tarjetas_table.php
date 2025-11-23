<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id('id_tarjeta');
            $table->unsignedBigInteger('id_usuario');
            $table->string('last4', 4);
            $table->string('brand', 20);
            $table->string('fecha_exp', 5);

            $table->foreign('id_usuario', 'fk_tarjetas_usuarios')
                ->references('id_usuario')
                ->on('usuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarjetas');
    }
};
