<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'rental_date',
        'return_date',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(cars::class);
    }

    public function payment()
    {
        return $this->hasOne(payment::class);
    }
}
