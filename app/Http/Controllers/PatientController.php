<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        return view('patient.dashboard');
    }
    public function appointment(){
        return view('patient.appointment');
    }
}
