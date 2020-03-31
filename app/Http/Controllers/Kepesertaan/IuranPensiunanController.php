<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IuranPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.iuranpensiunan.index');
    }
}
