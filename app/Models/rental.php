<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    protected $fillable = [
        'user_id',
        'cars_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(cars::class, 'cars_id');
    }
}
