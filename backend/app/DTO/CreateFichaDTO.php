<?php


namespace App\DTO;
use App\models\Treino\Ficha;

class CreateFichaDTO
{
    public function __construct (
        public string $statusFicha,
        public int $divisaoId,
        public int $personalId,
        public string $nomeFicha,
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
           
            statusFicha: $dados['status_ficha'] ?? $dados['statusFicha'],
            divisaoId:   $dados['divisao_id'] ?? $dados['divisaoId'],
            personalId:  $dados['personal_id'] ?? $dados['personalId'],
            nomeFicha:   $dados['nome_ficha'] ?? $dados['nomeFicha'],
        );
    }
}
