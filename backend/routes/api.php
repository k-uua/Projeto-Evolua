<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
    

 




})->middleware('auth:sanctum');
    Route::prefix('treino')->group(function () {
        Route::post('/ficha', [\App\Http\Controllers\Treino\FichaExercicioController::class, 'store'])->name('ficha.store');
    });

    Route::prefix('exercicio')->group(function () {
        Route::post('/', [\App\Http\Controllers\Exercicio\ExercicioController::class, 'store'])->name('exercicio.store');
        Route::get('/', [\App\Http\Controllers\Exercicio\ExercicioController::class, 'listarExercicios'])->name('exercicio.listar');
        Route::get('/buscar', [\App\Http\Controllers\Exercicio\ExercicioController::class, 'buscarExercicioPorNome'])->name('exercicio.buscarExercicioPorNome');
        Route::get('/{id}', [\App\Http\Controllers\Exercicio\ExercicioController::class, 'buscarExercicioPorId'])->name('exercicio.buscarExercicioPorId');  
   
        });