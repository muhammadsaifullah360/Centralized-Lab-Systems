<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'test',
        'price',
        'address',
        'phone',
        'status',
        'remark',
        'user_id',
        'lab_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
