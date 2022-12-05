<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lab;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function main_dashboard()
    {
        $total_labs= Lab::count();
        return view('admin.main_dashboard',compact('total_labs'));
    }

    public function laboratories()
    {

        $store_users = Admin::orderBy('name')->pluck('name', 'id');
        $laboratories = Lab::orderBy('name')->get();
        return view('admin.laboratories', compact('store_users', 'laboratories'));
    }

    public function delete_labs($id)
    {
        $laboratories = Lab::findOrfail($id);
        $laboratories->delete();
        return redirect()->route('laboratories.show', compact('laboratories'))->with('message', 'Lab has been deleted successfully');
    }

    public function laboratories_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_number' => 'required',
            'contact' => 'required',
            'address' => 'required ',
            'admins_id' => 'required|exists:admins,id',
        ]);
        Lab::create(request()->all());
        return back()->with('message', 'Lab has been added successfully');
    }

    public function users()
    {
        $store_users = Admin::orderBy('name', 'asc')->paginate(4);
        return view('admin.users', compact('store_users'));
    }

    public function store_users(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',

        ]);
        Admin::create($request->all());
        return redirect()->route('users.show')->with('message', 'User has been added successfully');
    }

    public function delete_users($id)
    {
        $store_users = Admin::findOrfail($id);
        $store_users->delete();
        return redirect()->route('users.show')->with('message', 'User has been deleted successfully');
    }

    public function edit_users($id)
    {
        $store_users = Admin::findOrfail($id);
        return view('admin.operations.edit_users', compact('store_users'));
    }

    public function update_users(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
        $store_users = Admin::findOrfail($id);
        $store_users->update($request->all());
        return redirect()->route('users.show')->with('message', 'User has been updated successfully');
    }
}
