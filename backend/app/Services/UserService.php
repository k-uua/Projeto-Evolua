<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function criarUsuario(array $dados, int $perfilId):User
    {
        return User::create([
            'nome' => $dados['nome'],
            'sobrenome' => $dados['sobrenome'],
            'email' =>$dados['email'],
            'password'=> Hash::make($dados['password']),
            'foto_perfil' => $dados['foto_perfil'],
            'sexo' => $dados['sexo'],
            'perfil_id' => $perfilId
        ]);
    }
}
?>