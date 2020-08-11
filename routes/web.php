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


Route::get('challenges/create', 'ChallengesController@create')->name('challenges.create');
Route::post('challenges/store', 'ChallengesController@store')->name('challenges.store');
Route::get('challenges/show/{challenge_id}', 'ChallengesController@show')->name('challenges.show');
Route::get('challenges/edit/{challenge_id}', 'ChallengesController@edit')->name('challenges.edit');
Route::post('challenges/update/{challenge_id}', 'ChallengesController@update')->name('challenges.update');
Route::post('challenges/delete/{challenge_id}', 'ChallengesController@destory')->name('challenges.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// トップページ（VueRouter使用）のルーティング 
// ※ 他のルーティングに干渉しないように、このファイルの一番最後に記述すること
Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
