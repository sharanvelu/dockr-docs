<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class View
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
        view()->share([
            'appLogo' => asset('logo/half.png'),
            'appIcon' => asset('logo/small.ico'),
            'appName' => config('app.name'),

            // Dockr Repo Links
            'dockrGithub' => configEnv('dockr.github'),
            'dockrDockerHub' => configEnv('dockr.docker_hub'),

            // Repo Logo
            'githubLogo' => asset('logo/others/github.png'),
            'dockerHubLogo' => asset('logo/others/docker_hub.png'),

            // Path for setting Title of the page
            'titlePath' => $this->parseTitlePath($request),
        ]);

        return $next($request);
    }

    /**
     * Parse Title Path Text
     *
     * @param Request $request
     * @return string
     */
    private function parseTitlePath(Request $request)
    {
        $path = $request->route()->parameter('path');

        if (isset($path)) {
            $path = str_replace('-', ' ', $path);
            $path = str_replace('_', ' ', $path);
            return ucwords(strtolower($path)) . ' |';
        }
        return '';
    }
}
