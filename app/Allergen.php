<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    protected $fillable =
        [
            'gluten',
            'ei',
            'vis',
            'melk',
            'schaaldieren',
            'peulvruchten',
            'tomaat',
            'soja',
        ];
}
