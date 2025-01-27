<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class seeders_perfil extends Seeder
{

    public function run()
    {
        DB::table('perfil')->insert(['id_perfil'=>'1','perfil'=>'Administrador']);
        DB::table('perfil')->insert(['id_perfil'=>'2','perfil'=>'Estudainte']);
        DB::table('perfil')->insert(['id_perfil'=>'3','perfil'=>'Aspirante']);
        DB::table('perfil')->insert(['id_perfil'=>'4','perfil'=>'Analista']);
        DB::table('perfil')->insert(['id_perfil'=>'5','perfil'=>'Profesor']);
    }
}
