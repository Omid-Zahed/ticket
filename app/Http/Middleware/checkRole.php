<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        return $next($request);
        $route_name=request()->route()->getName();
        if ($route_name=="dashboard.profile")return $next($request);
        $route_list= config("permissions.url");
        $needed_permission= $route_list[$route_name]??null;
        if (!$needed_permission)abort(403,"You don't have permission to access this page : ".$route_name);
        /**
         * @var User $user
         */
        $user=Auth::user();
        if($user->hasPermissionTo($needed_permission))  return $next($request);
        abort(403);
    }
}
