<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntermediateController extends Controller
{
    public function showLoader()
    {
        return view('intermediate');
    }
}