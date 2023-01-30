<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable= [
        'user_id',
        'appointment_id',
        'lab_id',
        'stars_rated'
    ];
    public function lab(){
      return  $this->belongsTo(Lab::class);
    }
    use HasFactory;
}
