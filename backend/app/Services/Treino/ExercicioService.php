<?php

namespace App\Services\Treino;

use App\DTO\UpdateExercicioDTO;
use App\Models\Treino\Exercicio;
use App\DTO\CreateExercicioDTO;

class ExercicioService {
    public function criarExercicio(CreateExercicioDTO $dto) : Exercicio
    {
        try{
            return Exercicio::create([
                'nome_exercício' => $dto ->nome_exercício,
                'grupo_muscular_id' => $dto ->grupoMuscularId,
                'descricao' => $dto ->descricao,
                'gif_url' => $dto ->gifUrl,
            ]);
        }catch(\Exception $e){
            throw new \Exception("Erro ao criar exercício: " . $e->getMessage());
        }
    }

    public function listarExercicios() 
    {
        try{
            return Exercicio::all();
        }catch(\Exception $e){
            throw new \Exception("Erro ao listar exercícios: " . $e->getMessage());
        }
    }

    public function buscarExercicioPorId(int $id) : ?Exercicio
    {
        try{
            return Exercicio::findOrFail($id);
        }catch(\Exception $e){
            throw new \Exception("Erro ao buscar exercício: " . $e->getMessage());
        }
    }

    public function atualizarExercicio(UpdateExercicioDTO $dto) : Exercicio
    {
        try{
            $exercicio = Exercicio::findOrFail($dto-> id);
            $exercicio->update([
                'nome_exercicio' => $dto ->nome_exercício,
                'grupo_muscular_id' => $dto ->grupoMuscularId,
                'descricao' => $dto ->descricao,
                'gif_url' => $dto ->gifUrl,
            ]);
            return $exercicio;
        }catch(\Exception $e){
            throw new \Exception("Erro ao atualizar exercício: " . $e->getMessage());

        }
    }

    public function deletarGrupoMuscular(int $id)
    {
        try{
            $exercicio = Exercicio::findOrFail($id);
            $exercicio->delete();
            return true;
        }catch(\Exception $e){
            throw new \Exception("Erro ao deletar exercício: " . $e->getMessage());
        }
    }
}