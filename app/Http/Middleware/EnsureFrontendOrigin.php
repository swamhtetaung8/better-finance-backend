<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureFrontendOrigin
{
    public function handle(Request $request, Closure $next)
    {
        $allowedOrigin = env('FRONTEND_URL', 'http://localhost:3000');

        if ($request->headers->get('origin') !== $allowedOrigin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
