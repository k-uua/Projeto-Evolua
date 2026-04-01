<?php

namespace App\Models\Perfil;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfil";

    protected $fillable = [
        'nome_perfil'
    ];
    
}
