<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(seeders_usuario::class);
        $this->call(seeders_perfil::class);
        $this->call(seeders_persona::class);
    }
}
