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
        Schema::create('curso_profesor',function($curso_profesor){
            $curso_profesor->increments('id');
            $curso_profesor->integer('id_profesor');
            $curso_profesor->integer('id_curso');
            $curso_profesor->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
