<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Uid\Uuid;

class AssignRequestIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Your middleware logic (Before generating the response) goes here:
        $requestId = $request->headers->get('X-Request-Id');

        if (!$requestId) {
            $requestId = (string) Uuid::v4();

            $request->headers->set('X-Request-Id', $requestId);
        }

        $response = $next($request);

        //  Your middleware logic (After generating the response) goes here:

        $response->headers->set('X-Request-Id', $requestId);

        return $response;
    }
}
