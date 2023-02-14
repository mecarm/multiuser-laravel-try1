<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('user')->check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
