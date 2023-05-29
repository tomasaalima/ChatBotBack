<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pergunta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerguntaController extends Controller
{

    public function getAll()
    {
        $perguntas=Pergunta::paginate();
        return response()->json($perguntas,200);
    }

    public function getById($id)
    {
        $perguntas=Pergunta::findOrFail($id);
        return response()->json([$perguntas]);
    }

    public function insert(Request $request)
    {
        $data=$request->validate(
        [
            'id'=>'integer',
            'pergunta'=>'required|string|max:255',
            'resposta'=>'required|string|max:255'
        ]
        );
        Pergunta::create($data);
        return response()->json(['message'=>'Questao gravado com sucesso!'],Response::HTTP_CREATED);
    }

    public function update(Request $request,$id)
    {
        $data=$request->all();
        $pergunta=Pergunta::findOrFail($id);
        $pergunta->update($data);
        return  response()->json(['message'=>'Questao atualizado com sucesso!'],Response::HTTP_OK);
    }

    public function delete($id)
    {
        Pergunta::findOrFail($id)->delete();
        return response()->json([],Response::HTTP_NO_CONTENT);
    }
}
