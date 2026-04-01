<?php

namespace App\DTO;
use App\Models\Treino\Exercicio;

class UpdateExercicioDTO
{
    public function __construct(
        public int $id,
        public string $nome_exercício,
        public int $grupoMuscularId,
        public string $descricao,
        public string $gifUrl,
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
            id: $dados['id'],
            nome_exercício: $dados['nome_exercício'],
            grupoMuscularId: $dados['grupo_muscular_id'],
            descricao: $dados['descricao'],
            gifUrl: $dados['gif_url'],
        );
    }

}