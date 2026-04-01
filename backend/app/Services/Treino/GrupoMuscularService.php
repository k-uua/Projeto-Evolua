<?php   

namespace App\Services\Treino;
use App\Models\Treino\GrupoMuscular;

class GrupoMuscularService
{
    public function criarGrupoMuscular(array $dados) : GrupoMuscular
    {   

        try{
            return GrupoMuscular::create([
            'nome_muscular' => $dados['nome_muscular'],
            ]);
        }catch(\Exception $e){
            throw new \Exception("Erro ao criar grupo muscular: " . $e->getMessage());
        }
        
    }

    public function listarGruposMusculares()
    {
        try{
            return GrupoMuscular::all();
        }catch(\Exception $e){
            throw new \Exception("Erro ao listar grupos musculares: " . $e->getMessage());
        }
    }

    public function buscarGrupoMuscularPorId(int $id) : ?GrupoMuscular
    {
        try{
            return GrupoMuscular::findOrFail($id);
        }catch(\Exception $e){
            throw new \Exception("Erro ao buscar grupo muscular: " . $e->getMessage());
        }
    }

    public function atualizarGrupoMuscular(int $id, array $dados) : GrupoMuscular
    {
        try{
            $grupoMuscular = GrupoMuscular::findOrFail($id);
            $grupoMuscular->update([
                'nome_muscular' => $dados['nome_muscular'],
            ]);
            return $grupoMuscular;
        }catch(\Exception $e){
            throw new \Exception("Erro ao atualizar grupo muscular: " . $e->getMessage());
        }
    }

    public function deletarGrupoMuscular(int $id)
    {
        try{
            $grupoMuscular = GrupoMuscular::findOrFail($id);
            $grupoMuscular->delete();
            return true;
        }catch(\Exception $e){
            throw new \Exception("Erro ao deletar grupo muscular: " . $e->getMessage());
        }
    }
}
