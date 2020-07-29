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
    return view('welcome');
});

Route::get('/recipes/create', 'RecipesController@create')->name('recipes.create');
Route::post('/recipes/store', 'RecipesController@store')->name('recipes.store');
Route::get('/recipes/show/{id}', 'RecipesController@show')->name('recipes.show')->where('id', '[0-9]+');

// Route::resoure('/recipes/{recipe_id}/challenges', 'ChallengesController', ['except' => ['index']]);
Route::get('recipes/{recipe_id}/challenges/create', 'ChallengesController@create');
Route::get('recipes/{recipe_id}/challenges/edit/{challenge_id}', 'ChallengesController@edit');
Route::get('recipes/{recipe_id}/challenges/show/{challenge_id}', 'ChallengesController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
