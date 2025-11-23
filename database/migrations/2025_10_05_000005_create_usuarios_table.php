<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('correo',255)->unique();
            $table->string('nip',100);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->boolean('sesion_activa')->default(false);
            $table->unsignedTinyInteger('intentos_login')->default(0);
            $table->timestamp('ultimo_intento')->nullable();
            $table->timestamp('bloqueado_hasta')->nullable();
            $table->enum('rol', ['paciente', 'empleado'])->default('paciente');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};