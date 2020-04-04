<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerubahanStatusOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.perubahanstatusorder.index');
    }
}
