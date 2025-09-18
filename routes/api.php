<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;

Route::get('/professors/search-name', [ProfessorController::class, 'searchName']);
Route::get('/professors/search-cpf', [ProfessorController::class, 'searchCpf']);

Route::apiResource('professors', ProfessorController::class);


