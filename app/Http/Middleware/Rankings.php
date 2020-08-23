<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View; //View::share()を利用するため
use App\Challenge;


class Rankings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct()
    {
        $this->rankings = Challenge::withCount('favorites')
        ->orderBy('favorites_count', 'desc')->take(3)->get();
    }

    public function handle($request, Closure $next)
    {
        View::share(['rankings' => $this->rankings]);

        return $next($request);
    }
}
