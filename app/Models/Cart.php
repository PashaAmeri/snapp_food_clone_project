<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'is_paid'
    ];

    public function res()
    {

        return $this->belongsTo(Restaurant::class);
    }

    public function food()
    {

        return $this->hasMany(Food::class);
    }
}
