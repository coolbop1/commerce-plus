<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
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
        switch (true) {
            case !is_null($request->route('store_id')):
                    $store_id = $request->route('store_id');
                    if((!$request->user()->isStoreAdmin($store_id)) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
                        return response()->json(['message' => 'Permission denied'], 401);
                    }
                break;
            case !is_null($request->route('cart_id')):
                    $cart_id = $request->route('cart_id');
                    if((!$request->user()->ownsCart($cart_id)) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
                        return response()->json(['message' => 'Permission denied'], 401);
                    }
                break;
            case !is_null($request->route('cart_user_id')):
                    $cart_user_id = $request->route('cart_user_id');
                    info("request->user()->id ".$request->user()->id);
                    info("cart_user_id ".$cart_user_id);
                    if(($request->user()->id !=  $cart_user_id) && (!$request->user()->hasRole('ROLE_SUPERADMIN'))) {
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