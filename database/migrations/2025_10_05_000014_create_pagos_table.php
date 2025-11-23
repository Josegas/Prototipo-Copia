<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_receta');
            $table->unsignedBigInteger('id_tarjeta')->nullable();
            $table->decimal('monto', 8, 2);

            $table->primary('id_receta', 'pk_pagos');

            $table->foreign('id_receta', 'fk_pagos_recetas')
                ->references('id_receta')
                ->on('recetas');

            $table->foreign('id_tarjeta', 'fk_pagos_tarjetas')
                ->references('id_tarjeta')
                ->on('tarjetas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
