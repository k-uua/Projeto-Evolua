<?php

namespace App\Models\Aluno;

use Illuminate\Database\Eloquent\Model;

class ConviteAluno extends Model
{
    protected $table = 'convite_aluno';

    protected $fillable = [
        'aluno_id',
        'email',
        'token',
        'expires_at',
        'used_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}