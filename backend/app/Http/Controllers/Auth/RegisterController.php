<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Personal\PersonalRequest;
use App\Models\Personal\Personal;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request, PersonalRequest $personalRequest,UserService $userService){
        $request->validaded();
        $personalRequest->validated();
        $perfilPersonal = 1;

        $usuario = $userService->criarUsuario(
            $request->all(),
            $perfilPersonal
        );
    
        Personal::create([
            'usuario_id' => $usuario->id,
            'biografia' => $personalRequest->biografia,
        ]);
    }
}
 