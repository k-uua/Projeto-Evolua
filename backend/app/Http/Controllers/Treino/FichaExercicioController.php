<?php

namespace App\Http\Controllers\Treino;

use App\Http\Controllers\Controller;

use App\Http\Requests\Treino\CreateFichaRequest;
use App\Http\Requests\Treino\UpdateFichaRequest;


use App\DTO\CreateFichaDTO;
use App\DTO\UpdateFichaDTO;
use App\Services\Treino\FichaService;

use App\Traits\ApiResponseTrait;

use Illuminate\Http\JsonResponse;


class FichaExercicioController extends Controller
{
    use ApiResponseTrait;
    private FichaService $fichaService;


    public function __construct(FichaService $fichaService)
    {
        
        $this->fichaService = $fichaService;

    }

    public function store(CreateFichaRequest $createFichaRequest): JsonResponse



{
        return $this->handleResponse(function () use ($createFichaRequest) {
            $fichaDto = CreateFichaDTO::fromRequest($createFichaRequest->validated());

            return $this->fichaService->criarfichacompleta(
                $fichaDto,
                $createFichaRequest->input('exercicios', [])
             );
        }, "Ficha e exercícios criados com sucesso", 201);
        
        
       
        
    
}

    public function update(UpdateFichaRequest $updateFichaRequest): JsonResponse
    {

        return $this->handleResponse(function () use ($updateFichaRequest) {
            $fichaDto = UpdateFichaDTO::fromRequest($updateFichaRequest->validated());
            $ficha = $this->fichaService->atualizarFicha($fichaDto);

            return $ficha;

        }, "Ficha atualizada com sucesso", 200);
        
            

            

            
    }
   
    

   

   
}