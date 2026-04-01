<?php

namespace App\Treino\Services;

use App\Models\Treino\Divisao;

Class DivisaoService{
    public function criarDivisao(array $dados): Divisao
    {
        try{
            return Divisao :: create([
                'nome_divisao' => $dados['nome_divisao'],
                
            ]);
        }catch(\Exception $e){
            throw new \Exception("Erro ao criar divisão: " . $e->getMessage());
        }
    }

    public function listarDivisao()
    {
        try{
            return Divisao :: all();
        }catch(\Exception $e){
            throw new \Exception("Erro ao listar divisão: " . $e->getMessage());
        }
    }

    public function buscarDivisaoPorId(int $id) : ?Divisao
    {
        try{
            return Divisao :: findOrFail($id);
        }catch(\Exception $e){
            throw new \Exception("Erro ao buscar divisão: " . $e->getMessage());
        }
    }

    public function atualizarDivisao(int $id, array $dados) : Divisao
    {
        try{
            $divisao = Divisao :: findOrFail($id);
            $divisao->update([
                'nome_divisao' => $dados['nome_divisao'],
                
            ]);
            return $divisao;
        }catch(\Exception $e){
            throw new \Exception("Erro ao atualizar divisão: " . $e->getMessage());

        }
    }

    public function deletarDivisao(int $id)
    {
        try{
            $divisao = Divisao :: findOrFail($id);
            $divisao->delete();
        }catch(\Exception $e){
            throw new \Exception("Erro ao deletar divisão: " . $e->getMessage());
        }
    }
}