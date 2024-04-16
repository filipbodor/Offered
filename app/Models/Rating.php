<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'advertisement_id',
        'user_id',
        'rating',
    ];
}
