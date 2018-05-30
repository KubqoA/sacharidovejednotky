<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
