<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Grupo_MuscularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents(database_path('seeders/data/grupo_muscular.json'));
        $grupoMuscular = json_decode($jsonData, true);

        foreach ($grupoMuscular as &$grupo) {
            $grupo['created_at'] = now();
            $grupo['updated_at'] = now();
        }

        \Illuminate\Support\Facades\DB::table('grupo_muscular')->insert($grupoMuscular);
    }
}
