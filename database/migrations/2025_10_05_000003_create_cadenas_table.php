<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('cadenas', function (Blueprint $table) {
            $table->char('id_cadena', 3);
            $table->string('nombre', 50);

            $table->primary('id_cadena');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('cadenas');
    }
};
