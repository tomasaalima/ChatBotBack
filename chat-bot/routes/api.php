<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\FluxController;
use App\Http\Controllers\api\InscriptionController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\AboutController;
use App\Http\Controllers\api\TutorialController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\KeywordsController;
use Illuminate\Support\Facades\Route;




Route::post('login',[AuthController::class,'login']);
//EndPoints de edital que não precisam de Auth

//Pesquisar por id
Route::get('editais/{id}',[EditalController::class,'getById']);

//Listar fluxos
Route::get('fluxos',[FluxController::class,'getAll']);
Route::get('fluxos/{id}',[FluxController::class,'getById']);

//Listar inscrições
Route::get('inscricoes',[InscriptionController::class,'index']);

//Listar tutorias
Route::get('tutoriais',[TutorialController::class,'index']);
//Pesquisar por id
Route::get('tutoriais/{id}',[TutorialController::class,'getById']);

//Listar sobre
Route::get('sobre',[AboutController::class,'index']);

//Buscar texto de boas vindas
Route::get('hello',[ChatController::class,'hello']);

//Buscar respostas ao diálogo do usuário
Route::get('keywords/{subject}/{text}', [KeywordsController::class, 'index']);

 //Listar editais
 Route::get('editais',[EditalController::class,'getAll']);

  //Inserindo editais
  Route::post('editais',[EditalController::class,'insert']);

//Vão precisar de auth
Route::group(['middleware'=>['apiJWT']],function()
{
    //Logout
    Route::post('logout',[AuthController::class,'logout']);
    //Atualizando edital
    Route::patch('editais/{id}',[EditalController::class,'update']);
    //Deletando edital
    Route::delete('editais/{id}',[EditalController::class,'delete']);

    //Inserindo fluxo
    Route::post('fluxos',[FluxController::class,'insert']);
    //Atualizando fluxo
    Route::patch('fluxos/{id}',[FluxController::class,'update']);
    //Deletando fluxo
    Route::delete('fluxos/{id}',[FluxController::class,'delete']);
});

