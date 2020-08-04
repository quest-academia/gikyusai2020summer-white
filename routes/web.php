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


Route::get('recipes/{recipe_id}/challenges/create', 'ChallengesController@create');
Route::post('recipes/{recipe_id}/challenges/store', 'ChallengesController@store')->name('challenges.store');
Route::get('recipes/{recipe_id}/challenges/show/{challenge_id}', 'ChallengesController@show')->name('challenges.show');
Route::get('recipes/{recipe_id}/challenges/edit/{challenge_id}', 'ChallengesController@edit');
Route::post('recipes/{recipe_id}/challenges/update/{challenge_id}', 'ChallengesController@update')->name('challenges.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//TODOいいね関係 Favoritecontoller追加
Route::put('/favorite/{challenge}', 'ChallengesController@favorite')->name('favorite');
Route::delete('/favorite/{challenge}', 'ChallengesController@unfavorite');

Route::get('/favorite/{challenge}', 'ChallengesController@get');
