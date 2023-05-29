<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\FluxController;
use App\Http\Controllers\api\ManualController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\SobreController;
use App\Http\Controllers\api\VideoController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\KeywordsController;
use Illuminate\Support\Facades\Route;




Route::post('login',[AuthController::class,'login']);
//EndPoints de edital que não precisam de Auth

//Pesquisar por id
Route::get('editais/{id}',[EditalController::class,'getById']);

//Listar questões
Route::get('questoes',[PerguntaController::class,'getAll']);
Route::get('questoes/{id}',[PerguntaController::class,'getById']);

//Listar inscrições
Route::get('manuais',[ManualController::class,'index']);

//Listar tutorias
Route::get('videos',[VideoController::class,'index']);

//Listar sobre
Route::get('sobre',[SobreController::class,'index']);

//Buscar texto de boas vindas
Route::get('init',[ChatController::class,'init']);

//Buscar respostas ao diálogo do usuário
Route::get('keywords/{text}', [KeywordsController::class, 'index']);

 //Listar editais
 Route::get('editais',[EditalController::class,'getAll']);
 
     //Inserindo questao
     Route::post('questoes',[PerguntaController::class,'insert']);

//Vão precisar de auth
Route::group(['middleware'=>['apiJWT']],function()
{
    //Logout
    Route::post('logout',[AuthController::class,'logout']);
    //Atualizando edital
    Route::patch('editais/{id}',[EditalController::class,'update']);
    //Deletando edital
    Route::delete('editais/{id}',[EditalController::class,'delete']);
    //Atualizando questao
    Route::patch('questoes/{id}',[PerguntaController::class,'update']);
    //Deletando questao
    Route::delete('questoes/{id}',[PerguntaController::class,'delete']);
});

