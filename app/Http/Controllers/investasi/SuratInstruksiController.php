<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratInstruksiController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.suratinstruksi.index');
    }
}
