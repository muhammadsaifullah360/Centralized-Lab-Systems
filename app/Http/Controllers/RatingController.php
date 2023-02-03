<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $data = $request->validate([
            'rating' => 'required',
            'user_id' => 'required',
            'lab_id' => 'required'
        ]);
        if (Rating::where('user_id', $data['user_id'])->exists())
            Rating::where('user_id', $data['user_id'])->update($data);
        else Rating::create($data);
        return redirect()->route('report');
    }
}
