<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealPicture extends Model
{
    protected $fillable =
        [
            'meal_id',
            'mealpicture',
        ];
}
