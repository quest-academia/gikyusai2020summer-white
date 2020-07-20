<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
	protected $fillable = ['user_id','challenge_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
