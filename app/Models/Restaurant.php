<?php

namespace App\Models;

use Attribute;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

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

    // public function resturantOrders()
    // {

    //     return $this->hasMany(Cart::class);
    // }

    public function restaurantComments()
    {

        return $this->hasManyThrough(Comment::class, Cart::class);
    }

    public function commentPublisher()
    {

        return $this->hasManyDeep(User::class, [Cart::class, Comment::class], ['restaurant_id', 'cart_id', 'user_id', 'id']);
    }

    public function ordersItems()
    {

        return $this->hasManyDeep(Food::class, [Cart::class, Comment::class, CartItem::class], ['restaurant_id', 'cart_id', 'food_id', 'id']);
    }

    public function restaurantScore()
    {
        
        return $this-> hasMany(Comment::class);
    }
}
