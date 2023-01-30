<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request){

          $add_rating = $request->validate([
               'stars_rated'=> 'required',
               'appointment_id'=>'required',
               'user_id'=>'required',
              'lab_id'=>'required'
           ]);
           Rating::create($add_rating);
           return redirect()->route('report');
    }
}
