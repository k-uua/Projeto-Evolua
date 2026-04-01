<?php

namespace App\Services\Treino;
use App\DTO\CreateFichaExercicioDTO;
use App\DTO\UpdateFichaExercicioDTO;
use App\Models\Treino\FichaExercicio as FichaExercicioModel;

Class FichaExercicioService {

    public function criarFichaExercicio(CreateFichaExercicioDTO $dto) : FichaExercicioModel
    {
        try{
            return FichaExercicioModel::create([
                'ficha_id' => $dto ->fichaId,
                'exercicio_id' => $dto ->exercicioId,
                'series' => $dto ->series,
                'repeticoes' => $dto ->repeticoes,
                'carga' => $dto ->carga,
                'descanso' => $dto ->descanso,
                
                
            ]);
        }catch(\Exception $e){
            throw new \Exception("Erro ao criar ficha exercício: " . $e->getMessage());
        }
    }

    public function listarFichaExercicio()
    {
        try{
            return FichaExercicioModel::all();
        }catch(\Exception $e){
            throw new \Exception("Erro ao listar ficha exercício: " . $e->getMessage());
        }
    }

    public function buscarFichaExercicioPorId(int $id) : ?FichaExercicioModel
    {
        try{
            return FichaExercicioModel::findOrFail($id);
        }catch(\Exception $e){
            throw new \Exception("Erro ao buscar ficha exercício: " . $e->getMessage());
        }
    }

    public function atualizarFichaExercicio(UpdateFichaExercicioDTO $dto) : FichaExercicioModel
    {
        try{
            $fichaExercicio = FichaExercicioModel::findOrFail($dto->id);
            $fichaExercicio->update([
                'ficha_id' => $dto ->fichaId,
                'exercicio_id' => $dto ->exercicioId,
                'series' => $dto ->series,
                'repeticoes' => $dto ->repeticoes,
                'carga' => $dto ->carga,
                'descanso' => $dto ->descanso,
            ]);
            return $fichaExercicio;
        }catch(\Exception $e){
            throw new \Exception("Erro ao atualizar ficha exercício: " . $e->getMessage());

        }
    }

    public function deletarFichaExercicio(int $id)
    {
        try{
            $fichaExercicio = FichaExercicioModel::findOrFail($id);
            $fichaExercicio->delete();
        }catch(\Exception $e){
            throw new \Exception("Erro ao deletar ficha exercício: " . $e->getMessage());
        }
    }
}