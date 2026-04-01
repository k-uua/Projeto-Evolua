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
        Schema::create('exercicio', function(Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->string('gif_url');
            $table->unsignedBigInteger('grupo_muscular_id');
            $table->timestamps();

            $table->foreign('grupo_muscular_id')->references('id')->on('grupo_muscular')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicio');
    }
};
