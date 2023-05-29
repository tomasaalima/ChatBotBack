<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use App\Models\Video;

class VideoController extends Controller
{

    public function index()
    {
       return Video::all();
    }
}
