<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.statusorder.index');
    }
}
