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
        Schema::create('nacionalidad',function($nacionalidad){
            $nacionalidad->increments('id_nacionlidad');
            $nacionalidad->string('45');
            $nacionalidad->timestamps();
        });
    }
    public function down(): void
    {
        //
    }
};
