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
        Schema::create('ficha', function(Blueprint $table){
            $table->id();
            $table->string('nome_ficha');
            $table->string('status_ficha');
            $table->unsignedBigInteger('divisao_id');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha');
    }
};
