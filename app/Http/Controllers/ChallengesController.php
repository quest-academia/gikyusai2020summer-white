<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\ChallengesRequest;
use App\User;
use App\Recipe;
use App\Challenge;
use Carbon\Carbon;
use Illuminate\Foundation\Console\Presets\React;

class ChallengesController extends Controller
{

	public function create($recipe_id)
	{
		$recipe = Recipe::find($recipe_id);

		return view('challenges.create', [
			'recipe' => $recipe,
		]);
	}

	public function store(Request $request, $recipe_id)
	{

		$request->validate(
			[
				'impression' => 'required|max:3000',
				'challenge_img' => 'required',
			],
			[
				'impression.required' => 'コメントを入力してください。',
				'impression.max' => 'コメントは3000文字以内で入力してください。',
				'challenge_img.required' => '写真を添付してください。',
			]
		);

		try {
			// トランザクション開始
			\DB::beginTransaction();

			$challenge = new Challenge;
			$challenge->user_id = \Auth::user()->id;
			$challenge->recipe_id = $recipe_id;
			$challenge->impression = $request->impression;


			$challengeImg = $request->challenge_img;
			$extension = $challengeImg->guessExtension();

			//ファイル名を一意のものにする
			$user_id = \Auth::user()->id;
			$date = Carbon::now();
			$date = date('Ymdhis');
			$fileName = "challenge_{$user_id}_{$date}.{$extension}";
			$challenge->img = $fileName;

			// imgがnullを許容しないのでここで$challengeを初めて保存
			$challenge->save();

			// imgファイル自体を保存
			$challengeImg->storeAs('public/challenges_img', $fileName);

			// トランザクションの保存処理を実行
			\DB::commit();


			return redirect(route('challenges.show', [
				'challenge_id' => $challenge->id,
				'recipe_id' => $recipe_id,
			]))->with('status', '「作ってみた」を新規登録しました');
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
	}

	public function show($recipe_id, $challenge_id)
	{
		$recipe = Recipe::find($recipe_id);
		$challenge = Challenge::find($challenge_id);
		$user = User::find($challenge->user_id);

		return view('challenges.show', [
			'recipe' => $recipe,
			'challenge' => $challenge,
			'user' => $user,
		]);
	}

	public function edit($recipe_id, $challenge_id)
	{
		$challenge = Challenge::find($challenge_id);
		$recipe = Recipe::find($recipe_id);
		$recipe_id = $recipe->id;

		return view('challenges.edit', [
			'challenge' => $challenge,
			'recipe_id' => $recipe_id,
		]);
	}

	public function update(Request $request, $recipe_id, $challenge_id)
	{

		$request->validate(
			[
				'impression' => 'required|max:3000',
			],
			[
				'impression.required' => 'コメントを入力してください。',
				'impression.max' => 'コメントは3000文字以内で入力してください。',
			]
		);

		try {
			// トランザクション開始
			\DB::beginTransaction();

			$challenge = challenge::find($challenge_id);
			$challenge->impression = $request->impression;

			if (!isset($request->challenge_img)) {
				$challenge->img = $challenge->img;
			} else {
				$challengeImg = $request->challenge_img;
				$extension = $challengeImg->guessExtension();

				//ファイル名を一意のものにする
				$user_id = \Auth::user()->id;
				$date = Carbon::now();
				$date = date('Ymdhis');
				$fileName = "challenge_{$user_id}_{$date}.{$extension}";
				$challenge->img = $fileName;

				// imgファイル自体を保存
				$challengeImg->storeAs('public/challenges_img', $fileName);
			}

			$challenge->save();

			// トランザクションの保存処理を実行
			\DB::commit();

			return redirect(route('challenges.show', [
				'challenge_id' => $challenge->id,
				'recipe_id' => $recipe_id,
			]))->with('status', '「作ってみた」を更新しました');
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
	}

	public function destroy($challenge_id)
	{
	}

	// !iine関係  好き
	// public function favorite(Request $request, Challenge $challenge)
	// {
	// 	$challenge->favorites()->detach($request->user()->id);
	// 	$challenge->favorites()->attach($request->user()->id);
	// 	return [
	// 		'id' => $challenge->id,
	// 		'countFavorites' => $challenge->countFavorites()
	// 	];
	// }
	// //!イヤ
	// public function unfavorite(Request $request, Challenge $challenge)
	// {
	// 	$challenge->favorites()->detach($request->user()->id);

	// 	return [
	// 		'id' => $challenge->id,
	// 		'countFavorites' => $challenge->countFavorites()
	// 	];
	// }
	//!試し
	public function get(Challenge $challenge, User $user)
	{
		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
	//!イヤ
	public function unfavorite(Challenge $challenge, Request $request)
	{
		$challenge->favorites()->detach($request->user_id);

		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
	// !iine関係  好き
	public function favorite(Request $request, Challenge $challenge)
	{
		$challenge->favorites()->detach($request->user_id);
		$challenge->favorites()->attach($request->user_id);
		return [
			'id' => $challenge->id,
			'countFavorites' => $challenge->countFavorites()
		];
	}
}
