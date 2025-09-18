<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProfessorResource::collection(Professor::paginate(10));
    }

    // Busca pelo nome
    public function searchName(Request $request)
    {
        $searchTerm = $request->input('nome');

        $professors = Professor::query()->when($searchTerm, function ($query, $searchTerm){
            return $query->where('nome', 'LIKE', '%' . $searchTerm . '%');
        })->get();

        if(!$professors)
        {
            return response()->json([
                'mensagem' => 'Professor não encontrado.'
            ], 404);
        }

        return response()->json([
            'mensagem' => 'Professor encontrado.',
            'professors' => ProfessorResource::collection($professors)
        ], 201);
    }

    //Busca por cpf
    public function searchCpf(Request $request)
    {
        $professorCpf = $request->input('cpf');

        $professor = Professor::where('cpf', $professorCpf)->first();

        if ($professor) {
            return response()->json([
                'mensagem' => 'Professor encontrado.',
                'professor' => new ProfessorResource($professor)
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Nenhum professor encontrado com este CPF.'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * This method is not typically used in API controllers
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorRequest $request)
    {
        $professor = Professor::create($request->validated());
        return response()->json([
            'mensagem' => 'Professor cadastrado com sucesso.',
            'professor' => new ProfessorResource($professor)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        return new ProfessorResource($professor);
    }

    /**
     * Show the form for editing the specified resource.
     * This method is not typically used in API controllers
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->validated());
        return response()->json([
            'message' => 'Professor atualizado com sucesso!',
            'professor' => $professor 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return response()->json([
            'message' => 'Professor excluído com sucesso!'
        ], 200);
    }
}
