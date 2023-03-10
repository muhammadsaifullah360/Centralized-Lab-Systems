<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'status', 'lab_id'];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
