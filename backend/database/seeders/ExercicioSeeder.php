<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents(database_path('seeders/data/exercicios.json'));
        $exercicios = json_decode($jsonData, true);

        foreach ($exercicios as &$exercicio) {
            $exercicio['created_at'] = now();
            $exercicio['updated_at'] = now();
        }


        DB::table('exercicio')->insert($exercicios);
    }
}
