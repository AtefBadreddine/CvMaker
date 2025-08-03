<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CORSAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      	$response = $next($request);

        // Remove X-Frame-Options header
        $response->headers->remove('X-Frame-Options');

        // Add Content-Security-Policy header to allow specific origins
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'self' http://localhost:3000");
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'self' localhost:3000");
		$response->headers->set('Content-Security-Policy', "frame-ancestors 'self' https://reactcvmaker.web.app");
        return $response;
    }
}
