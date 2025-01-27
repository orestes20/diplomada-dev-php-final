<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('parroquia',function($parroquia){
            $parroquia->increments('id_parroquia');
            $parroquia->string('parroquia');
            $parroquia->integer('id_municipio');
            $parroquia->timestamps();
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
