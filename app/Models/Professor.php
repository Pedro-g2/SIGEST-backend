<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'rg',
        'genero',
        'nome_pai',
        'nome_mae',
        'deficiencia',
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'telefone',
        'celular',
        'email',
        'matricula_adpm'
    ];
}
