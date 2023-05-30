<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\ManualController;
use App\Http\Controllers\api\SobreController;
use App\Http\Controllers\api\VideoController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\KeywordsController;
use Illuminate\Support\Facades\Route;




Route::post('login',[AuthController::class,'login']);
//EndPoints de edital que não precisam de Auth


//Listar questões
Route::get('questoes',[PerguntaController::class,'getAll']);
Route::get('questoes/{id}',[PerguntaController::class,'getById']);


//Listar editais
Route::get('editais',[EditalController::class,'index']);
//Pesquisar por id
Route::get('editais/{id}',[EditalController::class,'getById']);
//Inserir edital
Route::post('editais',[EditalController::class,'store']);
//Remover edital
Route::delete('editais/{id}',[EditalController::class,'remove']);



//Listar manuais
Route::get('manuais',[ManualController::class,'index']);
//Pesquisar por id
Route::get('manuais/{id}',[ManualController::class,'getById']);
//Inserir manual
Route::post('manuais',[ManualController::class,'store']);
//Remover manual
Route::delete('manuais/{id}',[ManualController::class,'remove']);


//Listar videos
Route::get('videos',[VideoController::class,'index']);
//Pesquisar por id
Route::get('videos/{id}',[VideoController::class,'getById']);
//Inserir video
Route::post('videos', [VideoController::class, 'store']);
//Remover video
Route::delete('videos/{id}', [VideoController::class, 'remove']);


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

