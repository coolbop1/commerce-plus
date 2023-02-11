<?php

namespace App\Http\Middleware;

use App\Models\Product;
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
            return response()->json(['message' => 'This action is unauthorized .'], 401);
        }
    
        switch (true) {
            case !is_null($request->route('store_id')):
                    $store_id = $request->route('store_id');
                    if((!$request->user()->isStoreAdmin($store_id)) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
                        return response()->json(['message' => 'Permission denied'], 401);
                    }
                break;
            case  $request->route('product') instanceof Product:
                    $store_id = $request->route('product')->store_id;
                    if((!$request->user()->isStoreAdmin($store_id)) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
                        return response()->json(['message' => 'Permission denied'], 401);
                    }
                break;
            
            
            default:
                # code...
                break;
        }
        return $next($request);
    }
}
