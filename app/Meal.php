<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function mealCategory()
    {
        return $this->belongsTo(MealCategory::class);
    }
}
