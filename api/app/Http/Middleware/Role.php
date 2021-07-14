<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $admin, $user)
    {
       $roles = Authenticate::check() ? Authenticate::user()->role->pluck('name')->toArray() : [];

       if (in_array($admin, $roles)) {
           return $next($request);
       }
       elseif (in_array($user, $roles)) {
        return $next($request);
    }


       return Redirect::route('home');
       }
}
