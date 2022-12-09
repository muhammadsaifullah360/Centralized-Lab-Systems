<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;

class LabController extends Controller
{

    public function index()
    {
        $users = User::whereDoesntHave('lab')->get();
        $labs = Lab::with('user')->get();
        return view('admin.lab.index', compact('labs', 'users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
