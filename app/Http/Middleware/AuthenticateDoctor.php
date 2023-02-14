<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateDoctor
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('doctor')->check()) {
            return $next($request);
        }

        return redirect('/doctor/login');
    }
}
