<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Challenge extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function recipe()
	{
		return $this->belongsTo(Recipe::class);
	}

	public function favorites()
	{
		return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
	}
	// そのユーザーが良いねを押してるかどうか判定
	public function isFavoritedBy(?User $user)
	{
		return $user
			? (bool)$this->favorites->where('id', $user->id)->count()
			: false;
	}
	//いいねの数を数える
	public function countFavorites()
	{
		return $this->favorites->count();
	}
}
