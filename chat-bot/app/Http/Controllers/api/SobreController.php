<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sobre;
use App\Models\About;
use GuzzleHttp\Psr7\Request;

class SobreController extends Controller
{

    public function index()
    {
       return Sobre::all();
    }

    public function store(Request $request)
    {
        
    }
}
