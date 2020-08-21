<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	//テスト
	public function index()
	{
		$comments = Comment::all();
		return response()->json([
			'message' => 'ok',
			'comments' => $comments
		], 200, [], JSON_UNESCAPED_UNICODE);
	}

	//チャレンジごとのコメント・コメント数・投稿したユーザー名を取得
	public function getChallengeComments(int $challenge_id)
	{
		$challengeComments = Comment::where('challenge_id', $challenge_id)
			->with('user:id,name')->orderBy('updated_at', 'desc')->get();
		return [
			'comments' => $challengeComments,
			'countComment' => $challengeComments->count()
		];
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$comment = new Comment;
		$comment->user_id = $request->user()->id;
		$comment->challenge_id = $request->challenge_id;
		$comment->comment = $request->comment;
		$comment->save();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$comment = Comment::find($id);
		$comment->comment = $request->comment;
		$comment->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Comment::find($id)->delete();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}
}
