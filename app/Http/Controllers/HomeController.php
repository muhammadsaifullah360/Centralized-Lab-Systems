<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Test;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $tests = Test::where('status', 'Active')->get();
        if ($request->has('search')) {
            $search = str($request->get('search'))->trim()->lower();
            $results = Test::with('lab')->where('name', 'like', '%' . $search . '%')->get();
            return view('home', compact('tests', 'results'));
        }

        return view('/home', compact('tests'));
    }

}
