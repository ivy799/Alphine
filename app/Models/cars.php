<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'category',
        'price',
        'stock',
        'description',
    ];

    public function rentals()
    {
        return $this->hasMany(rental::class);
    }

    public function reviews()
    {
        return $this->hasMany(review::class);
    }

    public function car_details()
    {
        return $this->hasMany(car_details::class, 'car_id');
    }
}
