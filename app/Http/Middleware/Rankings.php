<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next)
    {
        $rankings = Challenge::withCount('favorites')
        ->orderBy('favorites_count', 'desc')->take(3)->get();
        return $next($request, ['rankings' => $rankings]);
    }
}
