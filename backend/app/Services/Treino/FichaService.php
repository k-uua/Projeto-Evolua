<?php


namespace App\Services\Treino;
use App\DTO\CreateFichaDTO;
use App\DTO\CreateFichaExercicioDTO;
use App\DTO\UpdateFichaDTO;
use App\Models\Treino\Ficha;
use Illuminate\Support\Facades\DB;

class FichaService {

    public function __construct(private FichaExercicioService $fichaExercicioService){}
    
    
    public function criarfichacompleta (CreateFichaDTO $fichaDto, array $exerciciosData): Ficha
        {
            try{
                return DB::transaction(function ()use ($fichaDto, $exerciciosData){
                $ficha = $this->criarFicha($fichaDto);

                foreach($exerciciosData as $ex){
                    $ex['fichaId'] = $ficha->id;
                    $dtoExercicio = CreateFichaExercicioDTO::fromRequest($ex);
                    $this->fichaExercicioService->criarFichaExercicio($dtoExercicio);
                }

                return $ficha;
            });
            }catch(\Exception $e){
                throw new \Exception("Erro ao criar ficha completa: " . $e->getMessage());
            }
            
        }
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
            $dadosParaAtualizar = array_filter([
                'status_ficha' => $dto->statusFicha,
                'divisao_id' => $dto->divisaoId,
                'personal_id' => $dto->personalId,
                'nome_ficha' => $dto->nomeFicha,
            ], function($value) {
                return !is_null($value);
            });
            $ficha->update($dadosParaAtualizar);
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