<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('persona',function($persona){
            $persona->increments('id_persona');
            $persona->string('nombre');
            $persona->string('apellido');
            $persona->string('cedula');
            $persona->string('fecha_nacimiento');
            $persona->string('sexo');
            $persona->string('correo');
            $persona->string('telefono');
            $persona->integer('id_usuario');
            $persona->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
