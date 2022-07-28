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

    public function cartCustomer()
    {

        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function cartStatus()
    {

        return $this->hasOne(OrderStatus::class, 'id', 'status');
    }

    public function itemsPrice()
    {

        return $this->hasMany(CartItem::class)->sum('price');
    }
}
