<?php

namespace App\Models\Treino;

use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    protected $table = 'divisao';
    protected $fillable = [
        'nome_divisao',
    ];
}
