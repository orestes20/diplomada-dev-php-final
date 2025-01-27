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
        Schema::create('estado_civil',function($estado_civil){
            $estado_civil->increments('id_estado_civil');
            $estado_civil->string('80');
            $estado_civil->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
