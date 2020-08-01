<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
