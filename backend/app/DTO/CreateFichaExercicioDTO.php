<?php

namespace App\DTO;
use App\models\Treino\FichaExercicio;


class CreateFichaExercicioDTO
{
    public function __construct(
        public int $fichaId,
        public int $exercicioId,
        public int $series,
        public int $repeticoes,
        public int $carga,
        public string $descanso,
        
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
            fichaId: $dados['ficha_id'],
            exercicioId: $dados['exercicio_id'],
            series: $dados['series'],
            repeticoes: $dados['repeticoes'],
            carga: $dados['carga'],
            descanso: $dados['descanso'],

        );
    }

}
