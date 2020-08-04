<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

//TODOいいね関係 Favoritecontoller追加
Route::put('/favorite/{challenge}', 'ChallengesController@favorite')->name('favorite');
Route::delete('/favorite/{challenge}', 'ChallengesController@unfavorite');

Route::get('/favorite/{challenge}', 'ChallengesController@get');
