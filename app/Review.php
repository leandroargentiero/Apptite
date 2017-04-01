<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =
        [
            'meal_id',
            'user_id',
            'review_rating',
            'review_description',
        ];
}
