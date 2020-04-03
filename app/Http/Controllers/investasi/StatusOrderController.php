<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.statusorder.index');
    }
}
