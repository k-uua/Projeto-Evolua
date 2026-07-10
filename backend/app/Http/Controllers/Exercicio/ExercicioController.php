<?php

namespace App\Http\Controllers\Exercicio;

use App\Http\Controllers\Controller;
use App\DTO\CreateExercicioDTO;

use App\Http\Requests\Exercicio\CreateExercicioRequest;

use App\Services\Treino\ExercicioService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;


class ExercicioController extends Controller
{

    use ApiResponseTrait;


    private ExercicioService $exercicioService;

    public function __construct(ExercicioService $exercicioService)
    {

        $this->exercicioService = $exercicioService;


    }

    public function store(CreateExercicioRequest $createExercicioRequest): JsonResponse
    {

        return $this->handleResponse(function () use ($createExercicioRequest) {
            $exercicioDto = CreateExercicioDTO::fromRequest($createExercicioRequest->validated());

            return $this->exercicioService->criarExercicio($exercicioDto);
        
        }, "Sucesso ao criar exercício", 201);
            


        
    }


    public function listarExercicios(): JsonResponse
    {
        return $this->handleResponse(function () {
           return  $this->exercicioService->listarExercicios();
            

           


        }, "Sucesso ao listar exercícios", 200);
    }

    public function buscarExercicioPorNome(Request $request): JsonResponse
    {
        return $this->handleResponse(function () use ($request) {
            $nome = $request->query('nome');
            

            return $this->exercicioService->buscarExercicioPorNome($nome);



        }, "Sucesso ao buscar exercício por nome", 200);
    }
    

    public function buscarExercicioPorId(int $id): JsonResponse
    {
        return $this->handleResponse(function () use ($id) {
            return $this->exercicioService->buscarExercicioPorId($id);
            

        }, "Sucesso ao buscar exercício por ID", 200);
    }




}
