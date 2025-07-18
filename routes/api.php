<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;

Route::apiResource('professors', ProfessorController::class);
