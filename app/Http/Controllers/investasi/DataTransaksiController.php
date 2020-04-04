<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataTransaksiController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.datatransaksi.index');
    }
}
