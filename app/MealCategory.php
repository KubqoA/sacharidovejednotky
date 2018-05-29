<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function meals()
    {
        $this->hasMany(Meal::class);
    }
}
