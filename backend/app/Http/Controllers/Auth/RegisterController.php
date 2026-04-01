<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Personal\PersonalRequest;
use App\Models\Personal\Personal;
use App\Services\PersonalService;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request, PersonalService $personalService){
        $perfilPersonalId = 1;
        $personalService->criarPersonal($request->validated(), $perfilPersonalId);
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para acessar sua conta.');
    }
}
 