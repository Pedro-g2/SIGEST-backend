<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessorRequest extends FormRequest
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
    // app/Http/Requests/UpdateProfessorRequest.php

public function rules(): array
{
    $professorId = $this->route('professor')->id ?? null; // Corrigido para 'professore'

    return [
        'nome' => 'nullable|string|max:255|min:5',
        'data_nascimento' => 'nullable|date',
        'cpf' => 'nullable|string|unique:professor,cpf,' . $professorId . ',id', // Reativar
        'rg' => 'nullable|string|max:20',
        'genero' => 'nullable|string|max:10',
        'nome_pai' => 'nullable|string|max:100',
        'nome_mae' => 'nullable|string|max:100',
        'deficiencia' => 'nullable|string|max:50',
        'logradouro' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:100',
        'complemento' => 'nullable|string|max:100',
        'cidade' => 'nullable|string|max:100',
        'estado' => 'nullable|string|max:2',
        'telefone' => 'string|max:15',
        'celular' => 'nullable|string|max:15',
        'email' => 'nullable|email|unique:professor,email,' . $professorId . ',id', // Reativar
        'matricula_adpm' => 'nullable|string|max:20'
    ];
}

    public function messages(): array
    {
        return [
            'nome.min' => 'O campo nome deve ter pelo menos 5 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'email.email' => 'O campo email deve ser um endereço de email válido.'
        ];
    }
}
