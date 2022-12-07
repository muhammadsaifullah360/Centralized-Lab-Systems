<?php

namespace App\Http\Controllers;

class OperatorController extends Controller
{
    public function index()
    {
        return view('operator.dashboard');
    }
}
