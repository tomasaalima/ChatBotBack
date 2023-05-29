<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sobre;
use App\Models\About;

class SobreController extends Controller
{

    public function index()
    {
       return Sobre::all();
    }
}
