<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// フォームリクエストを宣言
use App\Http\Requests\RecipesRequest;

class RecipesController extends Controller
{
	public function create()
    {
        return view('recipes.create', $data);
    }

	public function store(RecipesRequest $request)
    {
        $request->user()->movies()->create([
            'url' => $request->url,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
