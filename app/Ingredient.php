<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function recipes()
	{
		return $this->belongsTo(Recipe::class);
	}
}
