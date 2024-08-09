<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ano_AcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ano_academico')->insert([
            ['nombre' => 'Primer Grado'],
            ['nombre' => 'Segundo Grado'],
            ['nombre' => 'Tercer Grado'],
            ['nombre' => 'Cuarto Grado'],
            ['nombre' => 'Quinto Grado'],
            ['nombre' => 'Primer Año'],
            ['nombre' => 'Segundo Año'],
            ['nombre' => 'Tercer Año'],
            ['nombre' => 'Cuarto Año'],
            ['nombre' => 'Quinto Año'],
        ]);
    }
}
