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

Route::get('/recipes/create', 'RecipesController@create')->name('recipes.create');
Route::post('/recipes/store', 'RecipesController@store')->name('recipes.store');
Route::get('/recipes/show/{id}', 'RecipesController@show')->name('recipes.show')->where('id', '[0-9]+');


Route::get('challenges/create', 'ChallengesController@create')->name('challenges.create');
Route::post('challenges/store', 'ChallengesController@store')->name('challenges.store');
Route::get('challenges/show/{id}', 'ChallengesController@show')->name('challenges.show')->where('id', '[0-9]+');
Route::get('challenges/edit/{id}', 'ChallengesController@edit')->name('challenges.edit')->where('id', '[0-9]+');
Route::post('challenges/update/{id}', 'ChallengesController@update')->name('challenges.update')->where('id', '[0-9]+');
Route::post('challenges/delete/{id}', 'ChallengesController@destory')->name('challenges.delete')->where('id', '[0-9]+');

Auth::routes();

//TODOいいね関係 
Route::put('/favorite', 'FavoriteController@favorite')->name('favorite');
Route::put('/unfavorite', 'FavoriteController@unfavorite');

Route::get('/favorite/{challenge}', 'FavoriteController@get');
Route::get('/mypage', function () {
    return view('user.mypage');
});

// トップページ（VueRouter使用）のルーティング 
// ※ 他のルーティングに干渉しないように、このファイルの一番最後に記述すること
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
