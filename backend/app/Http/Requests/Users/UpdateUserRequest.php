<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserRequest extends FormRequest
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
         $userId = $this->route('user')?->id;
        return [
            'nome'        => ['required', 'string', 'max:100'],
            'sobrenome'   => ['required', 'string', 'max:100'],
            'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($userId)
        ],
            'foto_perfil' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'], // máx 2MB
            'sexo'        => ['nullable', 'string', 'in:M,F,Outro'],
        ];
    }
}
