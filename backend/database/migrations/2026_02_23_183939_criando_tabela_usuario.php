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
    Schema::create('usuario', function (Blueprint $table) {
        $table->id();
        $table->string('foto_perfil')->nullable();
        $table->string('nome', 45);
        $table->string('sobrenome', 45);
        $table->dateTime('data_nascimento');
        $table->string('email')->unique();
        $table->string('password'); 
        $table->enum('sexo', ['masculino', 'feminino', 'outro']);
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
         Schema::dropIfExists('usuario');
    }
};
