<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "sobrenome" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8|confirmed",
            "password_confirmation" => "required|string|min:8|same:password",
            "foto_perfil" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "sexo" => "required|in:masculino,feminino,outro",

            //personal
            'biografia' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'sobrenome.required' => 'O campo sobrenome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório.',
            'password_confirmation.min' => 'A confirmação da senha deve conter no mínimo 8 caracteres.',
            'password_confirmation.same' => 'A confirmação da senha deve ser igual à senha.',
            'foto_perfil.image' => 'O arquivo deve ser uma imagem.',
            'foto_perfil.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg, gif ou svg.',
            'foto_perfil.max' => 'A imagem não pode ser maior que 2048 kilobytes.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in' => 'O campo sexo deve ser masculino, feminino ou outro.',

            //personal
            'biografia.string' => 'A biografia deve ser uma string.',
            'biografia.max' => 'A biografia não pode conter mais que 255 caracteres.',
        ];
    }
}
