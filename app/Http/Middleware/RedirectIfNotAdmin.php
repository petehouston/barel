<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard != 'admin') {
            return redirect()->route('users.login');
        } else if(!auth()->guard($guard)->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
