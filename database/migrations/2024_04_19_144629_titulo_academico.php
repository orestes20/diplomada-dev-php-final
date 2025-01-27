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
        Schema::create('titulo_academico',function($titulo_academico){
            $titulo_academico->increments('id_titulo_academico');
            $titulo_academico->string('titulo_obtenido','100');
            $titulo_academico->string('institucion','100');
            $titulo_academico->date('anio_ingreso');
            $titulo_academico->integer('id_nivel_academico');
            $titulo_academico->timestamps();
        });
    }
    public function down(): void
    {
        
    }
};
