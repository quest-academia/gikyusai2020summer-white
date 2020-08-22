<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Challenge;

class RankingComposer
{
    protected $rankings;

    public function __construct()
    {
        $this->rankings = Challenge::withCount('favorites')
        ->orderBy('favorites_count', 'desc')->take(3)->get();
    }

    public function compose(View $view)
    {
        $view->with('rankings', $this->rankings);
    }
}