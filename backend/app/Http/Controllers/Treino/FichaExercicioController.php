<?php

namespace App\Http\Controllers\Treino;

use App\Http\Controllers\Controller;
use App\DTO\CreateFichaExercicioDTO;
use App\DTO\UpdateFichaExercicioDTO;
use App\Services\Treino\FichaExercicioService;

use App\DTO\CreateFichaDTO;
use App\DTO\UpdateFichaDTO;
use App\Services\Treino\FichaService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JsonException;

class FichaExercicioController extends Controller
{
    private FichaExercicioService $fichaExercicioService;
    private FichaService $fichaService;

    public function __construct(FichaExercicioService $fichaExercicioService, FichaService $fichaService)
    {
        $this->fichaExercicioService = $fichaExercicioService;
        $this->fichaService = $fichaService;

    }

    public function store(Request $request): JsonResponse
{
    // 1. Inicia a transação para garantir atomicidade
    return DB::transaction(function () use ($request) {
        
        $fichaDto = new CreateFichaDTO(
            statusFicha: $request->input('statusFicha'),
            divisaoId: $request->input('divisaoId'),
            personalId: $request->input('personalId'),
            nomeFicha: $request->input('nomeFicha'),
        );

        $ficha = $this->fichaService->criarFicha($fichaDto);

        if ($request->has('exercicios') && is_array($request->exercicios)) {
            foreach ($request->exercicios as $ex) {
                $fichaExercicioDTO = new CreateFichaExercicioDTO(
                    fichaId: $ficha->id,
                    exercicioId: $ex['exercicioId'],
                    series: $ex['series'],
                    repeticoes: $ex['repeticoes'],
                    carga: $ex['carga'],
                    descanso:    $ex['descanso'] ?? '01:00'
                );

                $this->fichaExercicioService->criarFichaExercicio($fichaExercicioDTO);
            }
        }

        return response()->json([
            'message' => 'Ficha e exercícios criados com sucesso',
            'data' => $ficha
        ], 201);
        
    });
}

    public function update(Request $request): JsonResponse
    {
       return DB::transaction(function() use ($request) {
            $fichaDto = UpdateFichaDTO::fromRequest($request->all());
            $ficha = $this->fichaService->atualizarFicha($fichaDto);

            if ($request->has('exercicios') && is_array($request->exercicios)) {
                foreach ($request->exercicios as $ex) {
                    $fichaExercicioDTO = UpdateFichaExercicioDTO::fromRequest($ex);
                    $this->fichaExercicioService->atualizarFichaExercicio($fichaExercicioDTO);
                }
            }

            return response()->json([
                'message' => 'Ficha e exercícios atualizados com sucesso',
                'data' => $ficha
            ], 200);
       });
    }
   
    

   

   
}