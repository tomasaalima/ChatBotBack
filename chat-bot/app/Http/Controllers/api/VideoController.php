<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VideoController extends Controller
{

    public function index()
    {
       return Video::all();
    }

    public function getById($id)
    {
        $tutorial=Video::findOrFail($id);
        return response()->json([$tutorial],Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'link' => 'required|string',
            'titulo' => 'required|string',
        ]);

        $tutorial = Video::create($data);

        return response()->json(['message' => 'Tutorial adicionado com sucesso!', 'tutorial' => $tutorial], 201);
    }

    public function remove($id)
    {
        $tutorial = Video::findOrFail($id);
        $tutorial->delete();

        return response()->json(['message' => 'Tutorial removido com sucesso!']);
    }
}
