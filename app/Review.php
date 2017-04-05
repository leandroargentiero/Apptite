<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =
        [
            'user_id',
            'reviewer_id',
            'review_rating',
            'review_description',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
