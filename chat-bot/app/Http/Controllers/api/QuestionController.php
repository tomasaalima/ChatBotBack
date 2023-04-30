<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Questao;

class QuestionController extends Controller
{

    public function index()
    {
        return Questao::all();
    }
}