<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Aluno\Aluno;
use App\Models\Personal\Personal;
use App\Models\Perfil\Perfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "usuario";
    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento',
        'email',
        'password',
        'foto_perfil',
        'sexo',
        'perfil_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'data_nascimento' => 'date',
            'password' => 'hashed',
        ];
    }

    public function personal()
    {
        return $this->hasOne(Personal::class);
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}
