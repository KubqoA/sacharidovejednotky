<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::guest()) {
        return view('welcome');
    }
    return redirect('/home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'EntriesController@index')->name('home');
    Route::resource('entry', 'EntriesController');
    Route::get('/meal', 'MealCategoryController@index')->name('mealCategory.index');
    Route::get('/meal/category/{id}', 'MealCategoryController@show')->name('mealCategory.show');
    Route::get('/meal/{meal}', 'MealController@show')->name('meal.show');
    Route::post('/meal/{meal}', 'EntriesController@storeMealEntry')->name('entry.storeMealEntry');
    Route::get('/settings', 'UserController@edit')->name('user.edit');
    Route::post('/settings', 'UserController@update')->name('user.update');
    Route::get('/summary', 'UserController@summary')->name('user.summary');
});
