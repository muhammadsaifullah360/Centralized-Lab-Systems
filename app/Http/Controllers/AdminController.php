<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalLabs = Lab::count();
        $users = User::where('role', 'user')->count();
        $totalSales = Appointment::sum('price');
        $percent = (20 / 100) * $totalSales;
        return view('admin.dashboard', compact('totalLabs', 'users', 'totalSales', 'percent'));
    }

    public function users()
    {

        $users = User::where('role', 'operator')->orderBy('name')->paginate(4);
        return view('admin.lab.user.index', compact('users'));
    }

    public function deleteLab($id)
    {
        $laboratories = Lab::findOrfail($id);
        $laboratories->delete();
        return redirect()->route('admin.lab.index', compact('laboratories'))->with('message', 'Lab has been deleted successfully');
    }

    public function storeLab(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_number' => 'required',
            'contact' => 'required',
            'address' => 'required ',
            'user_id' => 'required|exists:users,id',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $imageName);

        Lab::create([
            'name' => $request->name,
            'license_number' => $request->license_number,
            'contact' => $request->contact,
            'address' => $request->address,
            'user_id' => $request->user_id,
            'profile_image' => $imageName,
        ]);

        return redirect()->route('admin.lab.index')->with('message', 'Lab has been added successfully');
    }

    public function editLab($id)
    {
        $users = User::orderBy('name')->pluck('name', 'id');
        $laboratories = Lab::findOrfail($id);
        return view('admin.lab.edit', compact('users', 'laboratories'));
    }

    public function updateLab(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'license_number' => 'required',
            'contact' => 'required',
            'address' => 'required ',
            'users_id' => 'required|exists:users,id',
        ]);
        $laboratories = Lab::findOrfail($id);
        $laboratories->update(request()->all());
        return redirect()->route('admin.lab.index')->with('message', 'Lab has been updated successfully');
    }

    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'phone' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.lab.user.index')->with('message', 'Lab Operator has been added successfully');
    }

    public function deleteUser($id)
    {
        $users = User::findOrfail($id);
        $users->delete();
        return redirect()->route('admin.lab.user.index')->with('message', 'User has been deleted successfully');
    }

    public function editUser($id)
    {
        $users = User::findOrfail($id);
        return view('admin.lab.user.edit', compact('users'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
        $users = User::findOrfail($id);
        $users->update($request->all());
        return redirect()->route('admin.lab.user.index')->with('message', 'User has been updated successfully');
    }


}
