<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animals')->insert([
            [
                'name' => 'Bella',
                'species' => 'Vache',
                'birthdate' => '2020-05-15',
                'health_status' => 'Bonne santé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mouton 1',
                'species' => 'Mouton',
                'birthdate' => '2019-03-10',
                'health_status' => 'Vacciné',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poulette',
                'species' => 'Poulet',
                'birthdate' => '2021-07-20',
                'health_status' => 'Malade',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
