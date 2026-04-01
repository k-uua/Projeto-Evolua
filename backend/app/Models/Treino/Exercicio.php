<?php

namespace App\Models\Treino;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $table = 'exercicio';
    protected $fillable = [
        'nome_exercicio',
        'gif_exercicio',
        'descricao_exercicio',
        'grupo_muscular_id',
        
    ];

    public function grupoMuscular()
    {
        return $this->belongsTo(GrupoMuscular::class, 'grupo_muscular_id');
    }
}
