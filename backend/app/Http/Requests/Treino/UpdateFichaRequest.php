<?php

namespace App\Http\Requests\Treino;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFichaRequest extends FormRequest
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
            'nomeFicha'   => 'required|string|max:255',
            'statusFicha' => 'required|string|in:ativo,inativo',
            'divisao_id'  => 'required|integer|exists:divisao,id',
            'personal_id' => 'required|integer|exists:personal,id',
            
            
            'exercicios'             => 'required|array|min:1',
            'exercicios.*.exercicio_id' => 'required|integer|exists:exercicio,id',
            'exercicios.*.series'      => 'required|integer|min:1',
            'exercicios.*.repeticoes'  => 'required|string',
            'exercicios.*.carga'       => 'required|string',
            'exercicios.*.descanso'    => 'nullable|string',
        ];
        
    }

    public function messages()
    {
        return [
            'exercicios.required' => 'A ficha deve conter pelo menos um exercício.',
            'exercicios.*.exercicioId.required' => 'O campo exercicioId é obrigatório para cada exercício.',
            'exercicios.*.exercicioId.integer' => 'O campo exercicioId deve ser um número inteiro.',
            'exercicios.*.exercicioId.exists' => 'O exercício selecionado é inválido.',
            'exercicios.*.series.required' => 'O campo series é obrigatório para cada exercício.',
            'exercicios.*.series.integer' => 'O campo series deve ser um número inteiro.',
            'exercicios.*.series.min' => 'O campo series deve ser no mínimo 1.',
            'exercicios.*.repeticoes.required' => 'O campo repeticoes é obrigatório para cada exercício.',
            'exercicios.*.carga.required' => 'O campo carga é obrigatório para cada exercício.',
        ];
    }
}
