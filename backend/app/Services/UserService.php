<?php
namespace App\Services;

use App\DTO\UpdateUserDTO;
use App\Models\User;
use App\DTO\CreateUserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;


class UserService
{


    public function __construct(private UserRepository $userRepository)
    {}



    public function criarUsuario(CreateUserDTO $dto):User
    {
        $dto->password = Hash::make($dto->password);
        return $this->userRepository->criarUsuario($dto);
        
    }

    public function atualizarUsuario(User $user, UpdateUserDTO $dto) : User
    {
        return $this->userRepository->atualizarUsuario($user, $dto);
    }
    
    public function deletarUsuario(User $user) : bool
    {
        return $this->userRepository->deletarUsuario($user);
    }

    public function buscarUsuarioPorId(int $id): ?User
    {
        return $this->userRepository->buscarUsuarioPorId($id);
    }

    public function buscarUsuarioPorNome(string $nome): ?User
    {
        return $this->userRepository->buscarUsuarioPorNome($nome);
    }

    public function listarUsuarios(User $user)
    {
        return $this->userRepository->listarUsuarios($user);
    }






}
?>