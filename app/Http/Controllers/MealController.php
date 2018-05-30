<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MealController extends Controller
{
    public function search(Request $request)
    {
        $meals = Meal::where('name', 'like', '%'.$request->name.'%')->paginate(25)->appends(Input::except('page'));
        return view('meal.search', compact('meals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('meal.show', compact('meal'));
    }
}
