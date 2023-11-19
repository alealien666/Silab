<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, ...$roles)
    {
        // titik 3 di parameter itu variadic parameter yang selalu berbentuk array
        $user = $request->user();
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        return abort(403);
    }
}
