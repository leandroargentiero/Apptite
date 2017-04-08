<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable =
        [
            'user_id',
            'meal_name',
            'description',
            'available_places',
            'kitchen',
            'meal_picture',
            'price',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mealpicture()
    {
        return $this->hasMany(MealPicture::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function mealAllergen()
    {
        return $this->belongsTo(MealAllergen::class);
    }
}
