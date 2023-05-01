<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Questao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestaoController extends Controller
{

    public function getAll(Request $request)
    {
        $editais=Questao::paginate();
        return response()->json($editais,200);
    }

    public function getById(Request $request,$id)
    {
        $questao=Questao::findOrFail($id);
        return response()->json([$questao]);
    }

    public function insert(Request $request)
    {
        $data=$request->validate(
        [
            'id'=>'required|integer',
            'pergunta'=>'required|string|max:255',
            'proximos'=>'required|string|max:255'
        ]
        );
        Questao::create($data);
        return response()->json(['message'=>'Questao gravado com sucesso!'],Response::HTTP_CREATED);
    }

    public function update(Request $request,$id)
    {
        $data=$request->all();
        $questao=Questao::findOrFail($id);
        $questao->update($data);
        return  response()->json(['message'=>'Questao atualizado com sucesso!'],Response::HTTP_OK);
    }

    public function delete($id)
    {
        Questao::findOrFail($id)->delete();
        return response()->json([],Response::HTTP_NO_CONTENT);
    }
}