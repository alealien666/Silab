<?php

namespace App\Http\Middleware;

use App\Models\Lab;
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
        $slug = $request->route("slug");
        $lab = Lab::where('slug', $slug)->firstOrFail();

        if ($lab && $lab->status === 'di gunakan') {
            return redirect()->back()->with('error', 'Halaman Yang Anda Tuju Tidak Ada, Atau Halaman Rusak');
        }

        return $next($request);
    }
}
