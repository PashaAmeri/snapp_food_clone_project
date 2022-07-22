<?php

namespace App\Models;

use App\Models\RestaurantCommentAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = [
        'user_id',
        'cart_id',
        'restaurant_id',
        'score',
        'content'
    ];

    public function commentAuthor()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentWithCartItems()
    {

        return $this->hasManyDeep(Food::class, [Cart::class, CartItem::class], ['id', 'id', 'cart_id', 'id']);
    }

    public function commentReply()
    {

        return $this->hasOne(RestaurantCommentAnswer::class, 'reply_to');
    }
}
