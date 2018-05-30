<?php

namespace App\Http\Controllers;

use App\Meal;
use App\MealCategory;
use Illuminate\Http\Request;

class MealCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealCategories = MealCategory::withCount('meals')->get();
        return view('mealCategory.index', compact('mealCategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mealCategory = MealCategory::findOrFail($id);
        $meals = Meal::whereMealCategoryId($id)->paginate(30);
        return view('mealCategory.show', compact('mealCategory', 'meals'));
    }
}
