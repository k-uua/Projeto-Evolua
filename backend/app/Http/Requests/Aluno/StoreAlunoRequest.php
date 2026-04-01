<?php

namespace App\Http\Requests\Aluno;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'objetivo' => 'required|in:hipertrofia,emagrecimento,condicionamento',
            'nivel_atividade' => 'required|in:iniciante,intermediario,avancado',
            'observacao' => 'nullable|string|max:400'
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "O campo email é obrigatório.",
            "email.email" => "O campo email deve ser um endereço de email válido.",
            "objetivo.required" => "O campo objetivo é obrigatório.",
            "objetivo.in" => "O campo objetivo deve ser um dos seguintes: hipertrofia, emagrecimento, condicionamento.",
            "nivel_atividade.required" => "O campo nível de atividade é obrigatório.",
            "nivel_atividade.in" => "O campo nível de atividade deve ser um dos seguintes: iniciante, intermediário, avançado.",
            "observacao.string" => "O campo observação deve ser uma string.",
            "observacao.max" => "O campo observação deve ter no máximo 400 caracteres."
        ];
    }
}
