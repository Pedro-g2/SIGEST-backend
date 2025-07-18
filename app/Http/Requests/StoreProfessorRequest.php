<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorRequest extends FormRequest
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
            'nome' => 'required|string|max:255|min:5',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|unique:professor,cpf',
            'rg' => 'nullable|string|max:20',
            'genero' => 'nullable|string|max:10',
            'nome_pai' => 'nullable|string|max:100',
            'nome_mae' => 'nullable|string|max:100',
            'deficiencia' => 'nullable|string|max:50',
            'logradouro' => 'string|max:255',
            'numero' => 'nullable|string|max:10',
            'bairro' => 'string|max:100',
            'complemento' => 'nullable|string|max:100',
            'cidade' => 'string|max:100',
            'estado' => 'string|max:2',
            'telefone' => 'string|max:15',
            'celular' => 'nullable|string|max:15',
            'email' => 'required|email|unique:professor,email',
            'matricula_adpm' => 'string|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos 5 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está cadastrado.'
        ];
    }
}
