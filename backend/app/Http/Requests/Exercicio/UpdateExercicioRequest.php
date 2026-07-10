<?php

namespace App\Http\Requests\Exercicio;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExercicioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'nome_exercicio'      => ['required', 'string', 'max:255'],
            'gif_exercicio'       => ['nullable', 'string', 'url'], // Assumindo que seja uma URL ou caminho
            'descricao_exercicio' => ['nullable', 'string'],
            'grupo_muscular_id'   => ['required', 'exists:grupo_muscular,id'], 
        ];
    }
}
