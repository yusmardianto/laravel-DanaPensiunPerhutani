<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataTransaksiController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.datatransaksi.index');
    }
}
