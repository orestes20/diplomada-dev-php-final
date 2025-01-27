<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('condicion_residencia',function($condicion_residencia){
            $condicion_residencia->increments('id_condicion_residencia');
            $condicion_residencia->string('80');
            $condicion_residencia->timestamps();
        });
    }

    public function down(): void
    {
    }
};
