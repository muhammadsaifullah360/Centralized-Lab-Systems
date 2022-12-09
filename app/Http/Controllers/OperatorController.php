<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Test;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {

        return view('operator.dashboard');
    }

    public function appointmentList()
    {
        return view('operator.lab.appointment');
    }

    public function tests()
    {
        $tests = Test::orderBy('name')->paginate(4);
        return view('operator.lab.test.tests', compact('tests'));
    }

    public function about()
    {
        return view('operator.lab.about');
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

}
