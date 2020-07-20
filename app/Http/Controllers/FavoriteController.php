<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
	public function index(Request $request) {
        return view('favorite.index');
    }

	public function user_list() {
        return $this->getUsers(); // 全ユーザーを取得
    }

    public function favorite(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'challenge_id' => 'required|exists:users,id'
        ]);

        $result = false;
        $exists = \App\Favorite::where('user_id', $request->user_id)
			->where('challenge_id', $request->challenge_id)
			->exists();

        if($exists == false) {
            $favorite = new \App\Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->challenge_id = $request->challenge_id;
            $result = $favorite->save();
        }

        return [
			'result' => $result,
            'users' => $this->getUsers() // 全ユーザーを取得
        ];
    }

    public function unfavorite(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'challenge_id' => 'required|exists:users,id'
        ]);

        $result = false;
        $favorite = \App\Favorite::where('user_id', $request->user_id)
			->where('challenge_id', $request->challenge_id)
			->first();

        if(!is_null($favorite)) {
            $result = $favorite->delete();
        }

        return [
			'result' => $result,
            'users' => $this->getUsers() // 全ユーザーを取得
        ];
    }

    public function getUsers() {
        return \App\User::with('favorites')
            ->withCount('favorites')
            ->get();
    }
}
