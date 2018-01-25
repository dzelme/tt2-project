<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->user() === null)
        {
            return response('Forbidden', 401);
        }
        //$actions is the array passed to route definitions in web.php
        $actions = $request->route()->getAction(); //getAction to access route key value pairs in web.php
        //checks if route is restricted (i.e., has roles specified), if it is, stores the roles
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        
        //checks if user has any of the allowed roles OR if roles are not set (i.e., allowed to visit)
        if($request->user()->hasAnyRole($roles) || !$roles)
        {
            return $next($request);
        }
        return response('Forbidden', 401);
    }
}
