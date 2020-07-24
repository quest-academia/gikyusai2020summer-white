<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Recipe;

class RecipesController extends Controller
{
	public function list()
	{
		$recipes = Recipe::orderBy('id', 'desc')->get();	
		return $recipes;
	}

	public function search(Request $request)
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
		$query = DB::table('recipes');

		// 各キーワードでレシピ名を検索
		foreach ($keywords as $keyword) {
			$query->where('name', 'like', "%".$keyword."%");
		}
		$recipes = $query->orderBy('id', 'desc')->get();

		return $recipes;
	}
}
