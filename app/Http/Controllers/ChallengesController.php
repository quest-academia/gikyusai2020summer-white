<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChallengesStoreRequest;
use App\Http\Requests\ChallengesUpdateRequest;
use App\User;
use App\Recipe;
use App\Challenge;
use Carbon\Carbon;
use Illuminate\Foundation\Console\Presets\React;

class ChallengesController extends Controller
{

	public function create(Request $request)
	{
		$recipe = Recipe::find($request->recipe_id);
		if ($recipe == null) {
			// statusを持たせてレシピ一覧ページにリダイレクトさせた方が良さそうですが、現在当該ページが制作されていないため、abort処理。
			abort(404, "ご指定のレシピが存在しません。");
		}

		if (!\Auth::check()) {
			return back()->with('status', 'ログインユーザーしか投稿できません');
		}

		return view('challenges.create', [
			'recipe' => $recipe,
		]);
	}

	public function store(ChallengesStoreRequest $request)
	{
		try {
			// トランザクション開始
			\DB::beginTransaction();

			$challenge = new Challenge;
			$challenge->user_id = \Auth::user()->id;
			$challenge->recipe_id = $request->recipe_id;
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
			]))->with('status', '「作ってみた」を新規登録しました');
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
	}

	public function show($challenge_id)
	{
		$challenge = Challenge::find($challenge_id);

		if ($challenge == null) {
			// statusを持たせてレシピ一覧ページにリダイレクトさせた方が良さそうですが、現在当該ページが制作されていないため、abort処理。
			abort(404, "ご指定の「作ってみた」が存在しません。");
		}

		$user = User::find($challenge->user_id);
		$recipe = Recipe::find($challenge->recipe_id);

		return view('challenges.show', [
			'challenge' => $challenge,
			'user' => $user,
			'recipe' => $recipe,
		]);
	}

	public function edit($challenge_id)
	{
		$challenge = Challenge::find($challenge_id);

		if ($challenge == null) {
			// statusを持たせてレシピ一覧ページにリダイレクトさせた方が良さそうですが、現在当該ページが制作されていないため、abort処理。
			abort(404, "ご指定の「作ってみた」が存在しません。");
		}

		if (\Auth::id() == $challenge->user_id) {
			return view('challenges.edit', [
				'challenge' => $challenge,
			]);
		}

		return back()->with('status', '投稿者本人しか編集できません。');
	}

	public function update(ChallengesUpdateRequest $request, $challenge_id)
	{
		try {
			// トランザクション開始
			\DB::beginTransaction();

			$challenge = Challenge::find($challenge_id);
			$challenge->impression = $request->impression;

			if (isset($request->challenge_img)) {
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
			]))->with('status', '「作ってみた」を更新しました');
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
	}

	public function destory($challenge_id)
	{
		$challenge = Challenge::find($challenge_id);
		$recipe_id = $challenge->recipe_id;

		if (\Auth::id() == $challenge->user_id) {
			$challenge->delete();
			return redirect(route('recipes.show', ['id' => $recipe_id]))->with('status', '「作ってみた」投稿を削除しました。');
		}

		return back()->with('status', '投稿者本人しか削除できません。');
	}
}
