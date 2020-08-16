<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// フォームリクエストを宣言
use App\Http\Requests\RecipesRequest;
use App\Http\Requests\IngredientsRequest;

use App\User;
use App\Recipe;
use App\Ingredient;

class RecipesController extends Controller
{
	public function show($id)
    {
		$recipe = Recipe::find($id);
		$ingredient = Ingredient::find($id);

		// レシピが存在しなかった場合
		if (is_null($recipe)) {
			abort(404, "ご指定のレシピは存在しません");
		}

        return view('recipes.show', [
			'recipe' => $recipe,
			'ingredient' => $ingredient
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

			
			$request->ingredients = array_filter($request->ingredients, 'strlen');
			$request->quantities = array_filter($request->quantities, 'strlen');
			$max = count($request->ingredients);
			for($i=0; $i<$max; $i++){						
				$ingredient = new Ingredient;
			  $ingredient->recipe_id = $recipe->id;	
				$ingredient->name =   $request-> ingredients[$i] ;
				$ingredient->quantity =   $request-> quantities[$i] ;
				$ingredient->save();
			}

			// トランザクションの保存処理を実行
			\DB::commit();

			dd($ingredient);
			return redirect(route('recipes.show', [
				'id' => $recipe->id
			]))->with('status', 'レシピを新規登録しました');

		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
		}
    }

	public function searchByWord(Request $request)
	{
		$keywords = $request->keyword;

		// ワイルドカードを文字列に変換
        $keywords = str_replace('%','\%',$keywords);
        $keywords = str_replace('_','\_',$keywords);
		$keywords = str_replace("　", " ", $keywords);
		$keywords = trim($keywords);
        // エスケープ文字を文字列に変換
        $keywords = str_replace('\\','\\\\',$keywords);
		$keywords = preg_replace("/\s+/", " ", $keywords);
		$keywords = explode(" ", $keywords);

		// レシピテーブルのクエリビルダーを取得
		$query = Recipe::with('user');

		// 各キーワードでレシピ名を検索
		foreach ($keywords as $keyword) {
			$query->where('name', 'like', "%".$keyword."%");
		}
		$recipes = $query->orderBy('id', 'desc')->paginate(5);

		return $recipes;
	}	
}
