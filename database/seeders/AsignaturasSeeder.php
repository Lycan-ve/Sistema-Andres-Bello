<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturasSeeder extends Seeder
{
    public function run()
    {
        DB::table('asignaturas')->insert([
            ['nombre' => 'Lengua y Literatura'],
            ['nombre' => 'Matemáticas'],
            ['nombre' => 'Ciencias Naturales'],
            ['nombre' => 'Ciencias Sociales'],
            ['nombre' => 'Ciudadanía e Identidad'],
            ['nombre' => 'Arte y Patrimonio'],
            ['nombre' => 'Inglés'],
            ['nombre' => 'Biología'],
            ['nombre' => 'Física'],
            ['nombre' => 'Química'],
            ['nombre' => 'Orientación y Convivencia'],
            ['nombre' => 'Geografía'],
            ['nombre' => 'Ciencias de la Tierra'],
            ['nombre' => 'Historia'],
            ['nombre' => 'Formación para la soberanía nacional'],
        ]);
    }
}
