<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->status !== 1) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
