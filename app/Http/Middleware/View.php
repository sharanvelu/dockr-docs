<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class View
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        view()->share([
            'appLogo' => asset('logo/half.png'),
            'appIcon' => asset('logo/small.ico'),
        ]);

        return $next($request);
    }
}
