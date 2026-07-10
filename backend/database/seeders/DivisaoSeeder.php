<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents(database_path('seeders/data/divisoes.json'));
        $divisoes = json_decode($jsonData, true);

        foreach ($divisoes as &$divisao) {
            $divisao['created_at'] = now();
            $divisao['updated_at'] = now();
        }

        DB::table('divisao')->insert($divisoes);
    }
}
