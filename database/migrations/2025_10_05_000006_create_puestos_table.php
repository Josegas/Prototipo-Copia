<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id('id_puesto');
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
