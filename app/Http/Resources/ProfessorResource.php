<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfessorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'genero' => $this->genero,
            'nome_pai' => $this->nome_pai,
            'nome_mae' => $this->nome_mae,
            'deficiencia' => $this->deficiencia,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'complemento' => $this->complemento,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'telefone' => $this->telefone,
            'celular' => $this->celular,
            'email' => $this->email,
            'matricula_adpm' => $this->matricula_adpm
        ];
    }
}
