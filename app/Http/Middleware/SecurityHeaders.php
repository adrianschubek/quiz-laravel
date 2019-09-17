<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set("X-Frame-Options", "SAMEORIGIN");
        $response->headers->set("X-Content-Type-Options", "nosniff");
        $response->headers->set("X-Xss-Protection", "1; mode=block");

        return $response;
    }
}
