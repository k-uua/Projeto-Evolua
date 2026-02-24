<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credenciais = $request->validated();
        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        };
    }
    
}
