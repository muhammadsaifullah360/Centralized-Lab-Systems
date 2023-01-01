<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fortest extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'num'
    ];
    public $timestamps = false;
}
