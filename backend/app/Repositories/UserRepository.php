<?php

namespace App\Repositories;

use App\DTO\CreateUserDTO;
use App\DTO\UpdateUserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function criarUsuario(CreateUserDTO $userDTO): User
    {
        return User::create([
            'nome' => $userDTO->nome,
            'sobrenome' => $userDTO->sobrenome,
            'email' => $userDTO->email,
            'password' => $userDTO->password,
            'foto_perfil' => $userDTO->foto_perfil,
            'sexo' => $userDTO->sexo,
            'perfil_id' => $userDTO->perfil_id,
        ]);
    }

    public function atualizarUsuario(User $user, UpdateUserDTO $userDTO): User
    {
    

        $user->update(($userDTO->toArray()));
        return $user;
    }

    public function deletarUsuario(User $user): bool
    {
        return $user->delete();
    }

    public function buscarUsuarioPorId(int $id): ?User
    {
        return User::find($id);
    }

    public function buscarUsuarioPorNome(string $nome): ?User
    {
        return User::where('nome', $nome)->first();
    }

    public function listarUsuarios(User $user) : Collection
    {
        return $user::all();
    }


    

    
}