<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterBankController extends Controller
{
    public function index()
    {
        return view('masters.bank.index');
    }
}
