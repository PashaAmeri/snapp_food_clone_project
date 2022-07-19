<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'user_id',
        'food_category_id',
        'food_name',
        'food_price',
        'food_ingredients',
        'food_description',
    ];
}
