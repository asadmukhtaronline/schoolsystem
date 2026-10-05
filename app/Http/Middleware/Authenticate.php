<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\Permission;
use App\Models\AssignPermission;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    
    // public function handle($request, Closure $next, ...$guards){
    //     if (Auth::check() && hasPermission($request->path())) {
    //         return $next($request);
    //     }
    //     abort(401); // Unauthorized
    // }
    

    /**
     * Check if the authenticated user has permission for the current route.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function checkPermissions($request)
    {
        // Get the current route name
        $routeName = $request->route()->getName();

        // Check if the authenticated user has permission for this route
        return hasPermission($routeName);
    }
}
