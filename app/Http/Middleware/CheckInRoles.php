<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;

class CheckInRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = explode('|', $role);
        info("roles ",$roles);
        $user_roles = $request->user()->roles->pluck('name')->toArray();
        info("user_roles ",$user_roles);
        if ((count(array_intersect($user_roles, $roles)) == 0) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
            return response()->json(['message' => 'This action is unauthorized .'], 401);
        }
    
        return $next($request);
    }
}
