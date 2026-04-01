<?php
namespace App\Services;

use App\Models\Personal\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;


class PersonalService{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function criarPersonal(array $dados, int $perfilPersonalId){
        return DB::transaction(function () use ($dados, $perfilPersonalId){
            $user = $this->userService->criarUsuario([
                'nome'        => $dados['nome'],
                'sobrenome'   => $dados['sobrenome'],
                'email'       => $dados['email'],
                'password'    => $dados['password'],
                'sexo'        => $dados['sexo'],
                'data_nascimento'   => $dados['data_nascimento'],
                'foto_perfil' => $dados['foto_perfil'] ?? null,
            ], $perfilPersonalId);
        

        $personal = Personal::create([
            'usuario_id' => $user->id,
            'biografia'  => $dados['biografia'] ?? null,
        ]);
        return $personal;
        });
    }
}
?>