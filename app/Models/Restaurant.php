<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_name',
        'restaurant_phone',
        'restaurant_address',
        'restaurant_category_id',
        'bank_number',
        'restaurant_description',
        'schedule',
    ];
}
