<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
    

 




})->middleware('auth:sanctum');
    Route::prefix('treino')->group(function () {
        Route::post('/ficha', [\App\Http\Controllers\Treino\FichaExercicioController::class, 'store'])->name('ficha.store');
    });