<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil',function($perfil){
            $perfil->increments('id_perfil');
            $perfil->text('perfil');
            $perfil->timestamps();
        });
    }

    public function down(): void
    {
        
    }
};
