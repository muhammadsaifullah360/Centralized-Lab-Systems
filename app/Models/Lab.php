<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'license_number',
        'contact',
        'address',
        'profile_image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function appoitnments()
    {
        return $this->hasOne(Appointment::class);
    }

    public function rating(){
        return$this->hasMany(Rating::class);
    }
}
