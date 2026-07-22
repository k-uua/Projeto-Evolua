<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'nome' => ['required', 'string', 'max:100'],

            'sobrenome' => ['required', 'string', 'max:100'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],

            'foto_perfil' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sexo' => [
                'nullable',
                'in:M,F,Outro',
            ],
        ];
    }
}
