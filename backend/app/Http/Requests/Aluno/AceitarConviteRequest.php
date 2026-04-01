<?php

namespace App\Http\Requests\Aluno;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AceitarConviteRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nome' => 'required|string|max:45',
        'sobrenome' => 'required|string|max:45',
        'password' => 'required|min:6|confirmed',
        'sexo' => 'required',
        'data_nasc' => 'required|date',
        'foto_perfil' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'sobrenome.required' => 'O campo sobrenome é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'data_nasc.required' => 'O campo data de nascimento é obrigatório.',
            'data_nasc.date' => 'O campo data de nascimento deve ser uma data válida.',
            'foto_perfil.image' => 'O arquivo deve ser uma imagem.',
        ];
    }
}
