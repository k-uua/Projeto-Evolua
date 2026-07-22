<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

use App\Services\UserService;
use App\DTO\CreateUserDTO;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;





class RegisterController extends Controller
{


    use ApiResponseTrait;
    private UserService $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    

    public function store(RegisterRequest $request):JsonResponse
    {


        return $this->handleResponse(function () use ($request) {
            $userDTO = CreateUserDTO::fromRequest($request->validated());
            return $this->userService->criarUsuario($userDTO);
        }, "Sucesso ao criar usuário", 201);



    }

    
    
}
 