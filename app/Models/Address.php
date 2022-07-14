<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'address',
        'latitude',
        'longitude',
        'is_current'
    ];

    public function userAddress()
    {

        return $this->belongsTo(User::class, 'user_id');
    }
}
