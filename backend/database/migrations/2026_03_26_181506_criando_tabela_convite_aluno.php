<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('convite_aluno', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aluno_id')->constrained('aluno')->cascadeOnDelete();

            $table->string('email');
            $table->string('token')->unique();

            $table->dateTime('expires_at');
            $table->dateTime('used_at')->nullable();

            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
