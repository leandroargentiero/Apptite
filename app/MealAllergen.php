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

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public  function allergen()
    {
        return $this->belongsTo(Allergen::class);
    }
}
