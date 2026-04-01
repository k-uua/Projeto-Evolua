<?php
namespace App\Services;

use App\Models\Aluno\ConviteAluno;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

class AlunoService {
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

     public function aceitarConvite(string $token, array $dados, int $perfilAlunoId)
    {
        return DB::transaction(function () use ($token, $dados, $perfilAlunoId) {

            $convite = ConviteAluno::where('token', $token)
                ->whereNull('used_at')
                ->where('expires_at', '>', now())
                ->lockForUpdate()
                ->firstOrFail();

            $user = $this->userService->criarUsuario([
                'nome'        => $dados['nome'],
                'sobrenome'   => $dados['sobrenome'],
                'email'       => $convite->email,
                'password'    => $dados['password'],
                'sexo'        => $dados['sexo'],
                'data_nascimento'   => $dados['data_nascimento'],
                'foto_perfil' => $dados['foto_perfil'] ?? null,
            ], $perfilAlunoId);

            $convite->aluno->update([
                'usuario_id' => $user->id
            ]);

            $convite->update([
                'used_at' => now()
            ]);

            return $user;
        });
}
}
?>