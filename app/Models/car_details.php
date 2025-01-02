<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car_details extends Model
{
    protected $fillable = [
        'car_id', // Add this line
        'color',
        'image',
        'review',
    ];

    public function car()
    {
        return $this->belongsTo(cars::class);
    }
}
