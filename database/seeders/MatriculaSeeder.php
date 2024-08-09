<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matricula')->insert([
            ['nombre' => 'Docente'],
            ['nombre' => 'Alumno'],
            ['nombre' => 'Representante']
        ]);
    }
}
