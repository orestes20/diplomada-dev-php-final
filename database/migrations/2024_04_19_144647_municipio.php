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
        Schema::create('municipio',function($municipio){
            $municipio->increments('id_municipio');
            $municipio->string('municipio','100');
            $municipio->integer('id_estado');
            $municipio->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
