<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    // Perfil
    $perfilId = DB::table('perfil')->insertGetId([
        'nome_perfil' => 'Administrador',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Usuário
    $usuarioId = DB::table('usuarios')->insertGetId([
        'nome' => 'Paulo',
        'sobrenome' => 'Cesar',
        'email' => 'paulo@exemplo.com',
        'password' => Hash::make('12345678'),
        'sexo' => 'masculino',
        'perfil_id' => $perfilId,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Personal
    DB::table('personal')->insert([
        'usuario_id' => $usuarioId,
        'biografia' => 'Personal Trainer experiente.',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Seeders
    $this->call([
        DivisaoSeeder::class,
        Grupo_MuscularSeeder::class,
        ExercicioSeeder::class,
    ]);
}
}