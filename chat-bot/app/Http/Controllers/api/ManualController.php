<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Manual;

class ManualController extends Controller
{

    public function index()
    {
       return Manual::all();
    }
}
