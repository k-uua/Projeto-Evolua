<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth; // Corrigido
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    
    public function login(LoginRequest $request): RedirectResponse
    {
       
        $credenciais = $request->validated();


       

        if (! Auth::attempt($credenciais)) {
            return back()->withErrors([
                'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
            ]) ->onlyInput('email');
        }

            $request->session()->regenerate();

            return redirect()->intended('dashboard'); 
        
        

    }
}