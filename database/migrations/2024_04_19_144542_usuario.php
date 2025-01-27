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
        Schema::create('usuario',function(Blueprint $usuario){
            $usuario->increments('id_usuario');
            $usuario->text('usuario');
            $usuario->text('clave');
            $usuario->integer('id_perfil');
            $usuario->integer('id_parroquia')->nullable();
            $usuario->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
