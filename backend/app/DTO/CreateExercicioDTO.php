<?php

namespace App\DTO;
use App\Models\Treino\Exercicio;

class CreateExercicioDTO
{
    public function __construct(
        public string $nome_exercício,
        public int $grupoMuscularId,
        public ?string $descricao = null,
        public string $gifUrl,
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
            nome_exercício: $dados['nome_exercicio'],
            grupoMuscularId: $dados['grupo_muscular_id'],
            descricao: $dados['descricao'] ?? null,
            gifUrl: $dados['gif_url'],
        );
    }

}

