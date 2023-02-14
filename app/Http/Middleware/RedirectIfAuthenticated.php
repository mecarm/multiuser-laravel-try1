<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (empty($guards)) {
            $guards = [config('auth.defaults.guard')];
        }
    
        foreach ($guards as $guard) {
            $userType = $request->input('user_type', 'user');
    
            auth()->shouldUse($userType . '.' . $guard);
        }
    
        return $next($request);
    }
    
}
