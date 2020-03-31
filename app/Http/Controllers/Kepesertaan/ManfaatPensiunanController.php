<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManfaatPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.index');
    }
}
