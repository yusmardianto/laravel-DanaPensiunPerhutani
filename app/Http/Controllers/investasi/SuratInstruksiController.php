<?php

namespace App\Http\Controllers\investasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratInstruksiController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.suratinstruksi.index');
    }
}
