<?php


namespace App\Services\Treino;
use App\DTO\CreateFichaDTO;
use App\DTO\UpdateFichaDTO;
use App\Models\Treino\Ficha;

class FichaService {
    public function criarFicha(CreateFichaDTO $dto) : Ficha
    {
        try{
            return Ficha::create([
                'status_ficha' => $dto->statusFicha,
                'divisao_id' => $dto->divisaoId,
                'personal_id' => $dto->personalId,
                'nome_ficha' => $dto->nomeFicha,
            ]);
        }catch(\Exception $e){
            throw new \Exception("Erro ao criar ficha: " . $e->getMessage());
        }
    }

    public function listarFichas()
    {
        try{
            return Ficha::all();
        }catch(\Exception $e){
            throw new \Exception("Erro ao listar fichas: " . $e->getMessage());
        }
    }

    public function buscarFichaPorId(int $id) : ?Ficha
    {
        try{
            return Ficha::findOrFail($id);
        }catch(\Exception $e){
            throw new \Exception("Erro ao buscar ficha: " . $e->getMessage());
        }
    }

    public function atualizarFicha(UpdateFichaDTO $dto) : Ficha
    {
        try{
            $ficha = Ficha::findOrFail($dto->id);
            $ficha->update([

                'status_ficha' => $dto->statusFicha,
                'divisao_id' => $dto->divisaoId,
                'personal_id' => $dto->personalId,
                'nome_ficha' => $dto->nomeFicha,
                
            ]);
            return $ficha;
        }catch(\Exception $e){
            throw new \Exception("Erro ao atualizar ficha: " . $e->getMessage());

        }
    }

    public function deletarFicha(int $id)
    {
        try{
            $ficha = Ficha::findOrFail($id);
            $ficha->delete();
        }catch(\Exception $e){
            throw new \Exception("Erro ao deletar ficha: " . $e->getMessage());
        }
    }
}