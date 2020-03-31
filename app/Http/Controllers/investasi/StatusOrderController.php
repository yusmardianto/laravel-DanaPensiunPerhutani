<?php

namespace App\Http\Controllers\investasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('investasi.statusorder.index');
    }
}
