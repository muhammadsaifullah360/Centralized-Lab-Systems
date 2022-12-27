<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        return view('patient.dashboard');
    }


    public function book($id = 0)
    {
        if ($test = Test::find($id)) {
            return view('patient.appointment', compact('test'));
        }
        return view('patient.appointment');

    }

    public function add_appointment(Request $request)
    {
        $data = $request->validate([
            'test' => 'required',
            'price' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        dd($data);
//        Appointment::create($data);
//        return redirect()->route('patient.dashboard')->with('message', 'Appointment has been booked successfully');
    }

    public function payment()
    {
        $test = Test::all();
        return view('patient.payment.checkout', compact('test'));
    }

}
