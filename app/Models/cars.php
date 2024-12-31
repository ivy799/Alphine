<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
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
}
