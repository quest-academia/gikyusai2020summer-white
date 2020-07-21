<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// フォームリクエストを宣言
use App\Http\Requests\RecipesRequest;

use App\User;
use App\Recipe;

class RecipesController extends Controller
{
	public function show($id)
    {
		$recipe = Recipe::find($id);

		// レシピが存在しなかった場合
		if (is_null($recipe)) {
			abort(404, "ご指定のレシピは存在しません");
		}

        return view('recipes.show', [
			'recipe' => $recipe,
		])->with('status', 'レシピを新規登録しました');
    }

	public function create()
    {
        return view('recipes.create');
    }

	public function store(RecipesRequest $request)
    {
		try {
			// トランザクション開始
			\DB::beginTransaction();

			$recipe = new Recipe;	
			$recipe->user_id = \Auth::user()->id;
			$recipe->name = $request->name;
			$recipe->time = $request->time;
			$recipe->liqueur = $request->liqueur;
			if (isset($request->invention)) {
				$recipe->invention = $request->invention;
			}
			// 一度保存して、$recipe->idを発行する
			$recipe->save();

			$recipeImg = $request->recipes_img;
			$extension = $recipeImg->guessExtension();
			// 上記で発行した$recipe->idをここで利用
			$fileName = "recipe_{$recipe->id}.{$extension}";

			// imgファイル名を保存
			$recipe->img = $fileName;
			$recipe->save();

			// imgファイル自体を保存
			$recipeImg->storeAs('public/recipes_img', $fileName);

			// トランザクションの保存処理を実行
			\DB::commit();

			return redirect(route('recipes.show', [
				'id' => $recipe->id
			]))->with('status', 'レシピを新規登録しました');

		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
    }
}
