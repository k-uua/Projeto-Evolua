<?php

namespace App\Models\Treino;

use App\Models\Treino\Ficha;
use App\Models\Treino\Exercicio;

use Illuminate\Database\Eloquent\Model;

class FichaExercicio extends Model
{
     protected $table = 'ficha_exercicio';
        protected $fillable = [
            'ficha_id',
            'exercicio_id',
            'series',
            'repeticoes',
            'carga', 
            'descanso',
        ];

        public function ficha()
        {
            return $this->belongsTo(Ficha::class, 'ficha_id');
        }

        public function exercicio()
        {
            return $this->belongsTo(Exercicio::class, 'exercicio_id');
        }
}
