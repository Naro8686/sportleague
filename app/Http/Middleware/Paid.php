<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Paid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null(Auth::user()->payment) || Auth::user()->payment->status != 'success' && Auth::user()->hasRole('participants')) {
            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}
