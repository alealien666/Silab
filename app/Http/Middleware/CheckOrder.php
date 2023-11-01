<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('order/')) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Halaman Yang Anda Tuju Tidak Ada, Atau Halaman Rusak');
    }
}
