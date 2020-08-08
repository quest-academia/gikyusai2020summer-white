<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	// レシピが所属するユーザを取得しやすいように関数で多対１の関係を定義
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function challenges()
	{
		return $this->hasMany(Challenge::class);
	}

	public function ingredients()
	{
		return $this->hasMany(Ingredient::class);
	}

	public function proceses()
	{
		return $this->hasMany(Ingredient::class);
	}
}
