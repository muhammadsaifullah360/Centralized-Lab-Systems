<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Fortest;
use App\Models\Lab;
use App\Models\Test;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        $TotalAppointments = Appointment::count();
        $pending = Appointment::where('status', 'pending')->count();
        $approved = Appointment::where('status', 'approve')->count();
        $done = Appointment::where('status', 'Done')->count();
        return view('patient.dashboard', compact('TotalAppointments', 'pending', 'approved', 'done'));
    }


    public function book($id = 0)
    {
        $user = auth()->user();
        $lab = Lab::find($id);
        if ($test = Test::find($id)) {
            return view('patient.appointment', compact('test', 'user', 'lab'));
        }
        return view('patient.appointment');

    }


    public function store(Request $request)
    {
        $request->validate([
            'test' => 'required',
            'price' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'lab_id' => 'required',
            'payment_type' => 'required'
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointment.list')
            ->with('success', 'Appointment created successfully.');
    }

    public function payment()
    {
        $test = Test::all();
        return view('patient.payment.checkout', compact('test'));
    }

    public function changePassword()
    {
        return view('auth.changePassword');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("message", "Password changed successfully!");
    }

    public function test()
    {
        return view('patient.test');
    }

    public function appointmentList()
    {
        $appointments = Appointment::all();
        return view('patient.appointmentList', compact('appointments'));
    }

    public function delete_appointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('appointment.list');
    }


    public function test_report()
    {

        $appointments = Appointment::where('status', 'Done')->get();
        return view('patient.test_report', compact('appointments'));
    }

    public function edit_report($id)
    {
        $appointment = Appointment::find($id);
        return view('patient.report', compact('appointment'));
    }

    public function generatePDF($id)
    {
        $appointment = Appointment::find($id);
        $pdf = PDF::loadView('patient._report', compact('appointment'));
        return $pdf->download('report.pdf');
    }

    public function view_appointment($id)
    {
        $app = Appointment::find($id);
        return view('patient.appointmentList', compact('app'));
    }

    /////for testing purpose
    public function addtest(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'num' => 'required'
        ]);
        Fortest::create($request->all());
        return back();
    }


}
