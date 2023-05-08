<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EditalController;
use App\Http\Controllers\api\FluxoController;
use App\Http\Controllers\api\InscricaoController;
use App\Http\Controllers\api\QuestaoController;
use App\Http\Controllers\api\SobreController;
use App\Http\Controllers\api\TutorialController;
use Illuminate\Support\Facades\Route;




Route::post('login',[AuthController::class,'login']);
//EndPoints de edital que não precisam de Auth

//Pesquisar por id
Route::get('editais/{id}',[EditalController::class,'getById']);

//Listar fluxos
Route::get('fluxos',[FluxoController::class,'getAll']);
Route::get('fluxos/{id}',[FluxoController::class,'getById']);

//Listar inscrições
Route::get('inscricoes',[InscricaoController::class,'index']);

//Listar tutorias
Route::get('tutoriais',[TutorialController::class,'index']);

//Listar sobre
Route::get('sobre',[SobreController::class,'index']);

 //Listar editais
 Route::get('editais',[EditalController::class,'getAll']);

//Vão precisar de auth
Route::group(['middleware'=>['apiJWT']],function()
{
    //Logout
    Route::post('logout',[AuthController::class,'logout']);
    //Inserindo edital
    Route::post('editais',[EditalController::class,'insert']);
    //Atualizando edital
    Route::patch('editais/{id}',[EditalController::class,'update']);
    //Deletando edital
    Route::delete('editais/{id}',[EditalController::class,'delete']);

    //Inserindo fluxo
    Route::post('fluxos',[FluxoController::class,'insert']);
    //Atualizando fluxo
    Route::patch('fluxos/{id}',[FluxoController::class,'update']);
    //Deletando fluxo
    Route::delete('fluxos/{id}',[FluxoController::class,'delete']);
});
