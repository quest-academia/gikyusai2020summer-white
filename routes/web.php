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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/index', 'PostController@index')->name('post.index');
Route::get('/create', 'PostController@create')->name('post.create');
Route::post('/store', 'PostController@store')->name('post.store');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'FavoriteController@index');
});

Route::get('/favorite/user_list', 'FavoriteController@user_list');
Route::post('/favorite', 'FavoriteController@favorite');
Route::post('/unfavorite', 'FavoriteController@unfavorite');
Route::get('/getUsers', 'FavoriteController@getUsers');

Route::get('/test', function() {
    return view('app');
});

//Route::get('/{any}', function() {
//    return view('app');
//})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
