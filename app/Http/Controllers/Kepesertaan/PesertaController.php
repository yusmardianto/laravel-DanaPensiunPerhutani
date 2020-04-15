<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.peserta.index');
    }

    public function getCreate(Request $request)
    {
        return view('kepesertaan.peserta.create');
    }
}
