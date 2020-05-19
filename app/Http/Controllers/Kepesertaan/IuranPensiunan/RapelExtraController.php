<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RapelExtraController extends Controller
{
    public function index()
    {
        return view('kepesertaan.iuranpensiunan.rapel-extra.index');
    }

    public function getCreate()
    {
        return view('kepesertaan.iuranpensiunan.rapel-extra.create');
    }
}
