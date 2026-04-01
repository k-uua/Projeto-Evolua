<?php

namespace App\Models\Treino;

use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    protected $table = 'grupo_muscular';
    protected $fillable = [
        'nome_muscular',
    ];


    public function exercicios() 
    {
    return $this->hasMany(Exercicio::class, 'grupo_muscular_id');
    }
}
