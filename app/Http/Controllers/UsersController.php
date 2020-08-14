<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Challenge;

class UsersController extends Controller
{
    public function mypage ()
    {
        $user = \Auth::user();

        // 自分が投稿した作ってみたをすべて取得
        $challenges = $user->challenges()->orderBy('created_at', 'desc')->get();

        // 自分がイイねしてる作ってみたをすべて取得
        $myFavors = $user->favors;

        // 自分がイイねされてる数の取得
        //// ユーザの所有するつくってみたIDをすべて取得
        $challengeIds = $user->challenges()->pluck("id");
        //// すべてつくってみたIDに一致するイイねを取得
        $followers = \DB::table('favorites')->whereIn('challenge_id', $challengeIds)->get();
        //// イイねの数を集計
        $followersCounts = count($followers);

        return view('user.mypage', [
            'challenges' => $challenges,
            'myFavors' => $myFavors,
            'followersCounts' => $followersCounts,
        ]);
    }

    // public function renameGet () {
    //     return view('user.rename');
    // }

    public function renamePost (Request $request) {
        $user = \Auth::User();

        $user->name = $request->name;
        $user->save();

        return redirect('mypage');
    }
}
