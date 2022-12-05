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
        'admins_id'
    ];

    public function lab(){
        return $this->belongsTo(User::class);
    }
}
