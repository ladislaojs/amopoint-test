<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = env('API_BASIC_AUTH_USER');
        $pass = env('API_BASIC_AUTH_PASS');

        if ($request->getUser() !== $user || $request->getPassword() !== $pass) {
            return response()->make('Unauthorized', 401, [
                'WWW-Authenticate' => 'Basic realm="API Access"'
            ]);
        }

        return $next($request);
    }
}
