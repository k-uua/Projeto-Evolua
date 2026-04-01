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
        Schema::create( 'ficha_exercicio', function(Blueprint $table){
            $table->id();
            $table->decimal('carga', 8, 2);
            $table->string('repeticoes');
            $table->integer('series');
            $table->string('descanso');
            $table->timestamps();

            $table->unsignedBigInteger('ficha_id');
            $table->unsignedBigInteger('exercicio_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_exercicio');
    }
};
