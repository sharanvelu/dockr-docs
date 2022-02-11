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
     * @throws \Exception
     */
    public function checkForReferences(Request $request)
    {
        $reference = $request->get('ref');
        if ($reference) {
            $cacheKey = 'web_ref_count_' . $reference;

            cache()->increment($cacheKey);
            Log::channel('slack')->info('Website Referenced', [
                'Referenced From' => $reference,
                'data' => [
                    'IP Address' => $request->getClientIp(),
                    'Time' => now()->format('d M Y - H:i:s A'),
                    'User Agent' => $request->userAgent(),
                ],
                'Count (Approx)' => cache()->get($cacheKey),
            ]);
        }
    }
}
