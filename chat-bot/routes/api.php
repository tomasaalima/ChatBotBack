<?php

use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\FluxoController;
use App\Http\Controllers\api\InscricaoController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\SobreController;
use App\Http\Controllers\api\TutorialController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\KeywordsController;
use Illuminate\Support\Facades\Route;

//Listar questões
Route::get('question',[QuestionController::class,'index']);

//Listar fluxos
Route::get('fluxos',[FluxoController::class,'index']);

//Listar editais
Route::get('editais',[EditalController::class,'index']);

//Listar inscrições
Route::get('inscricoes',[InscricaoController::class,'index']);

//Listar tutorias
Route::get('tutoriais',[TutorialController::class,'index']);

//Listar sobre
Route::get('sobre',[SobreController::class,'index']);

//Buscar texto de boas vindas
Route::get('hello',[ChatController::class,'hello']);

//Buscar respostas ao diálogo do usuário
Route::get('keywords/{subject}/{text}', [KeywordsController::class, 'index']);
