<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Paid
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null(Auth::user()->payment) && Auth::user()->hasRole('participants')) {
            return redirect()->route('pay');
        }
        return $next($request);
    }
}
