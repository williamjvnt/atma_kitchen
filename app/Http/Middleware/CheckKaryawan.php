<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckKaryawan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->karyawan()->id === 1 || $request->karyawan()->id === 2 || $request->karyawan()->id === 3) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
