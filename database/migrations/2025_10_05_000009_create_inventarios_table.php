<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->char('id_cadena', 3);
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_medicamento');

            $table->integer('stock_minimo');
            $table->integer('stock_maximo');
            $table->integer('stock_actual');
            $table->decimal('precio_actual', 8, 2);

            $table->primary(['id_cadena', 'id_sucursal', 'id_medicamento'], 'pk_inventarios');

            $table->foreign(['id_cadena', 'id_sucursal'], 'fk_inv_suc')
                ->references(['id_cadena', 'id_sucursal'])
                ->on('sucursales');

            $table->foreign('id_medicamento', 'fk_inv_med')
                ->references('id_medicamento')
                ->on('medicamentos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
