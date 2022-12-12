<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        return view('patient.dashboard');
    }

    public function book($id)
    {
        $test = Test::findOrfail($id);
        return view('patient.appointment', compact('test'));
    }

    public function payment()
    {
        return view('patient.payment.checkout');
    }

}
