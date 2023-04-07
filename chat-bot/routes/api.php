<?php

use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\FluxoController;
use App\Http\Controllers\api\InscricaoController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Resources\Inscricao;
use App\Models\Edital;
use App\Models\Fluxo;
use Illuminate\Support\Facades\Route;

//Listar questões
Route::get('question',[QuestionController::class,'index']);

//Listar fluxos
Route::get('fluxo',[FluxoController::class,'index']);
