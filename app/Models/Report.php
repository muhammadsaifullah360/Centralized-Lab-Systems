<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'normal_value',
        'resulted_value',
        'report_id',
        'remarks',
        'user_id'
    ];
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
