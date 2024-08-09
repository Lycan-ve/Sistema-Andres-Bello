<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seccion')->insert([
            ['nombre' => 'A'],
            ['nombre' => 'B'],
            ['nombre' => 'C'],
            ['nombre' => 'D'],
            ['nombre' => 'E']
        ]);
    }
}
