<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Challenge;

class FavoriteController extends Controller
{
	// いいねする
	public function favorite(Request $request)
	{
		$challenge = new Challenge;
		$challenge->id = $request->challenge_id;
		$challenge->favorites()->detach($request->user()->id);
		$challenge->favorites()->attach($request->user()->id);
		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
	// いいね外す
	public function unfavorite(Request $request)
	{
		$challenge = new Challenge;
		$challenge->id = $request->challenge_id;
		$challenge->favorites()->detach($request->user()->id);

		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
	//実験
	public function get(Challenge $challenge, User $user)
	{
		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
}
