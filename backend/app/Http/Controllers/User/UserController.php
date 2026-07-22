<?php

namespace App\Http\Controllers\User;

use App\DTO\UpdateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\SearchUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

use App\Models\User;
use App\Services\UserService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use ApiResponseTrait;
    private UserService $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function update(UpdateUserRequest $request): JsonResponse
    {
        return $this->handleResponse(function () use ($request) {
            $user = $request->user();
            $userDTO = UpdateUserDTO::fromRequest($request->validated());
            return $this->userService->atualizarUsuario($user, $userDTO);
        }, "Sucesso ao atualizar usuário", 200);

    }

    public function destroy(User $user): JsonResponse
    {
        return $this->handleResponse(function () use ($user){ 
            return $this->userService->deletarUsuario($user);
        }, "Sucesso ao deletar usuário", 200);
    }

    public function findUserForId(Request $request): JsonResponse
    {
        return $this->handleResponse(function () use ($request)
        {
            
            return $this->userService->buscarUsuarioPorId($request-> user()->id);
        }
        ,"Sucesso ao encontrar usuário", 200);
    }
    
    public function searchByName(SearchUserRequest $request) : JsonResponse
    {
        return $this->handleResponse(function () use ($request)
        {   
            $nome = $request->query('nome');
            return $this->userService->buscarUsuarioPorNome($nome);
        },"Sucesso ao encontrar usuário", 200
        
        );
    }
}
