<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeders_persona extends Seeder
{
    public function run(): void
    {
        DB::table('persona')->insert(['nombre'=>'admin','apellido'=>'admin','cedula'=>'00000001','fecha_nacimiento'=>'1900-01-01','sexo'=>'Masculino','correo'=>'admin@admin.com','telefono'=>'041212345678','id_usuario'=>'1']);
        DB::table('persona')->insert(['nombre'=>'admin','apellido'=>'admin','cedula'=>'00000001','fecha_nacimiento'=>'1900-01-01','sexo'=>'Masculino','correo'=>'admin@admin.com','telefono'=>'041212345678','id_usuario'=>'2']);
    }
}
