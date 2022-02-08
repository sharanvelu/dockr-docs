<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRequests
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->checkForReferences($request);

        return $next($request);
    }

    /**
     * Check if the website is referenced from.
     *
     * @param Request $request
     * @return void
     */
    public function checkForReferences(Request $request)
    {
        if ($request->get('ref')) {
            Log::channel('slack')->info('Website Referenced', [
                'Time' => now()->format('d M Y - H:i:s A'),
                'Referenced From' => $request->get('ref'),
            ]);
        }
    }
}
