<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|',$role);
        foreach ($roles as $key => $role) {
            if (Auth::user()->user_type == $role) {
                return $next($request);
            }
        }

        abort(404);
    }
}
