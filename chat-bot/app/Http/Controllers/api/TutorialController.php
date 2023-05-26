<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller
{

    public function index()
    {
       return Tutorial::all();
    }

    public function getById(Request $request,$id)
    {
        $tutorial=Tutorial::findOrFail($id);
        return response()->json([$tutorial],Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'src' => 'required|string',
            'title' => 'required|string',
        ]);

        $tutorial = Tutorial::create($data);

        return response()->json(['message' => 'Tutorial adicionado com sucesso!', 'tutorial' => $tutorial], 201);
    }

    public function remove($id)
{
    $tutorial = Tutorial::findOrFail($id);
    $tutorial->delete();

    return response()->json(['message' => 'Tutorial removido com sucesso!']);
}
}
