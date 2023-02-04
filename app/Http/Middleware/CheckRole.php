<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if ((!$request->user()->hasRole($role)) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
            return response()->json(['message' => 'This action is unauthorized.'], 401);
        }
        return $next($request);
    }
}
