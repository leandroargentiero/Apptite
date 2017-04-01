<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealAllergen extends Model
{
    protected $fillable =
        [
            'meal_id',
            'allergen_id',
        ];
}
