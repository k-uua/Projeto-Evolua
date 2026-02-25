<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run
     */
    public function up(): void
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); // Cria o 'id' como BIGINT UNSIGNED
        $table->string('foto_perfil')->nullable();
        $table->string('nome');
        $table->string('sobrenome');
        $table->string('email')->unique(); // ALTERADO de timestamp para string
        $table->string('password'); 
        $table->enum('sexo', ['masculino', 'feminino', 'outro']);
        
        // CHAVE ESTRANGEIRA
        // O método foreignId cria uma coluna 'perfil_id' compatível com o ID da tabela perfil
        $table->foreignId('perfil_id')->constrained('perfil'); 
        
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('usuarios');
    }
};
