<?php

namespace App\Models\Aluno;

use App\Models\Personal\Personal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = "aluno";

    protected $fillable = [
        'objetivo',
        'nivel_atividade',
        'observacao',
        'usuario_id',
        'personal_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function convite()
    {
        return $this->hasMany(ConviteAluno::class);
    }
}
