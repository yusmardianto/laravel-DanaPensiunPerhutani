<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SKPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.skpensiunan.index');
    }
}
