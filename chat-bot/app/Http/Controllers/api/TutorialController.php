<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

}