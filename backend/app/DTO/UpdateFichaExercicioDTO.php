<?php


namespace App\DTO;
use App\Models\Treino\FichaExercicio;
class UpdateFichaExercicioDTO
{
    public function __construct(
        public int $id,
        public int $fichaId,
        public int $exercicioId,
        public int $series,
        public int $repeticoes,
        public int $carga,
        public int $descanso,
    ){}

    public static function fromRequest(array $dados): self
    {
        return new self(
            id: $dados['id'],
            fichaId: $dados['ficha_id'],
            exercicioId: $dados['exercicio_id'],
            series: $dados['series'],
            repeticoes: $dados['repeticoes'],
            carga: $dados['carga'],
            descanso: $dados['descanso'],
        );
    }

}
