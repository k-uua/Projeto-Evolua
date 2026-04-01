<?php

namespace App\DTO;
use App\Models\Treino\ficha;

class UpdateFichaDTO
{
    public function __construct(
        public int $id,
        public string $statusFicha,
        public int $divisaoId,
        public int $personalId,
        public string $nomeFicha,
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
            id: $dados['id'],
            statusFicha: $dados['status_ficha'],
            divisaoId: $dados['divisao_id'],
            personalId: $dados['personal_id'],
            nomeFicha: $dados['nome_ficha'],
        );
    }

}