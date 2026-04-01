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

    public static function fromRequest(array $dados){
        return new self(
            statusFicha: $dados['status_ficha'],
            divisaoId: $dados['divisao_id'],
            personalId: $dados['personal_id'],
            nomeFicha: $dados['nome_ficha'],
        );
    }


}
