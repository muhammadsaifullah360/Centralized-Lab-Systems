<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Report;
use App\Models\Test;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $totalAppointments = Appointment::count();
        $pending = Appointment::where('status', 'pending')->count();
        $approved = Appointment::where('status', 'approve')->count();
        $done = Appointment::where('status', 'Done')->count();
        $totalTests = Test::where('lab_id', auth()->user()->lab()->get()->first()->id)->count();
        return view('operator.dashboard', compact('totalTests', 'totalAppointments', 'pending', 'approved', 'done'));
    }



//    public function appointmentList()
//    {
//        return view('operator.lab.appointment');
//    }

    public function about()
    {
        $lab = auth()->user()->lab()->get()->first();
        return view('operator.lab.about', compact('lab'));
    }

    public function tests()
    {
        $tests = null;
        if (auth()->user()->lab()->get()->first()) {
            $tests = Test::where('lab_id', auth()->user()->lab()->get()->first()->id)->get();
        }
        return view('operator.lab.test.tests', compact('tests'));
    }

    public function addTest(Request $request)
    {
        $labId = auth()->user()->lab()->get()->first()->id;
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        Test::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'lab_id' => $labId,
        ]);
        return redirect()->route('tests.dashboard')->with('message', 'Test has been added successfully');
    }

    public function deleteTest($id)
    {
        $tests = Test::findOrfail($id);
        $tests->delete();
        return redirect()->route('tests.dashboard', compact('tests'))->with('message', 'Test has been deleted successfully');
    }

    public function editTest($id)
    {

        $tests = Test::findOrfail($id);
        return view('operator.lab.test.edit', compact('tests'));
    }

    public function updateTest(Request $request, $id)
    {
        $tests = Test::findOrfail($id);
        $tests->update($request->all());
        return redirect()->route('tests.dashboard', compact('tests'))->with('message', 'Test has been updated successfully');
    }

    public function show_appointmentList()
    {

        $appointments = Appointment::where('lab_id', auth()->user()->lab()->get()->first()->id)->get();
        return view('operator.lab.appointment', compact('appointments'));
    }

    public function edit_appointment($id)
    {
        $app = Appointment::find($id);
        return view('operator.lab.appointment', compact('app'));
    }

    public function update_appointment(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'remark' => 'required'
        ]);
        $app = Appointment::find($id);
        $app->update($request->all());
        return redirect()->route('appointment', compact('app'))->with('message', 'Appointment status has been updated successfully');
    }

    public function uploadReport($id)
    {
        $app = Appointment::find($id);
        $report_id = rand(0, 1000000000);
        $get_detail = Report::find($id);
        return view('operator.lab.report', compact('app', 'report_id', 'get_detail'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'normal_value' => 'required',
            'resulted_value' => 'required',
            'report_id' => 'required',
            'remarks' => 'required',

        ]);
        Report::create($request->all());
        return redirect()->route('appointment');
    }
}
