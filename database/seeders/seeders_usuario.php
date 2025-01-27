<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class seeders_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert(['usuario'=>'admin@admin.com','clave'=>'eyJpdiI6IjNrczNuRHBYWXJQS1FRekxjWC92SVE9PSIsInZhbHVlIjoiSlBRVDh6dDlMN1BnQ3dadXVrMEZOdz09IiwibWFjIjoiNGIwOTBjMWQ5MDU2OGYwNjQwZWM5ZjFhYzkwYjMyZjExMWFkYjEyYTQzN2U0NzE3Nzc4YTJjYzYwNWMxZjIwZCIsInRhZyI6IiJ9','id_perfil'=>'1']);
        DB::table('usuario')->insert(['usuario'=>'admin1@admin.com','clave'=>Crypt::encrypt('12345678'),'id_perfil'=>'1']);
    }
}
