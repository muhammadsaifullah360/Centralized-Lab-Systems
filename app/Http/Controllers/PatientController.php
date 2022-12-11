<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        return view('patient.dashboard');
    }

    public function appointment($id)
    {

        $test = Test::find($id);
        return view('patient.appointment', compact('test'));
    }
//    public function appointment($id){
//        $users = User::orderBy('name')->pluck('name', 'id');
//        $tests = Test::findOrfail($id);
//        return view('patient.appointment',compact('tests'));
//    }

}
