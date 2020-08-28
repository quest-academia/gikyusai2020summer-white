<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
	public function challenge()
	{
		return $this->belongsTo(Challenge::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
