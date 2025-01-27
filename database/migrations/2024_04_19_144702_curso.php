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
        Schema::create('curso',function($curso){
            $curso->increments('id_curso');
            $curso->text('curso');
            $curso->integer('id_datos_pago');
            $curso->string('tiempo','50');
            $curso->string('modalidad','50');
            $curso->text('dirigido_a');
            $curso->text('objetivo');
            $curso->text('contexto');
            $curso->integer('horas_academicas');
            $curso->integer('id_turno');
            $curso->timestamps();
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
