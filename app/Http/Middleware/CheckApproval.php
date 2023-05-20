<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;

class CheckApproval
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
        $user = $_SESSION['logged_in'];
        $store_id = $_SESSION['vendor_current_store_id'] ?? $user->stores()->first()->id;
        $store = Store::find($store_id);
        if(!($store->approved)) {
            if($store->isSubscribed()){
                return redirect('/seller/getapproval');
            }
            return redirect('/seller/seller-packages');
        }elseif (!($store->isSubscribed())) {
            return redirect('/seller/seller-packages');
        } 
        
        return $next($request);
    }
}
