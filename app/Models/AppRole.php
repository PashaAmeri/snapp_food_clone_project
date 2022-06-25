<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
    ];
}
