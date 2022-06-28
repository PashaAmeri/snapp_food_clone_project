<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_code',
        'coupon_title',
        'coupon_description',
        'max_uses',
        'max_uses_per_user',
        'discount_amount',
        'is_percentage',
        'starts_at',
        'expires_at'
    ];
}
