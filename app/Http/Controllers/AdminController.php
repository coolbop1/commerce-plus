<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('webrole:ROLE_ADMIN');
    }
    
    public function index()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
            $store = Store::with('products.category', 'orders')->find($store_id);
            $products_id = $store->products->pluck('id')->toArray();
            $ratings_data = Cart::whereHas('checkout', function($q) {
                $q->where('status', 'completed');
            })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->select(DB::raw('count(*) as num'), DB::raw('sum(ratings) as total_ratings'))->first();
            $total_ratings = $ratings_data->total_ratings ?? 0;
            $total_sold = $ratings_data->num;
            $ratings = $total_sold > 0 ? ($total_ratings/$total_sold) : 0;
        } else {
            $store = $ratings = null;
        }
        
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $products_categories = $store ? $store->products()->pluck('category_id')->unique()->toArray() : Product::all()->pluck('category_id')->unique()->toArray();
        $products_brands = $store ? $store->products()->pluck('brand_id')->unique()->toArray() : Product::all()->pluck('brand_id')->unique()->toArray();
        $published_products = $store ? $store->products()->where('published', 1) :  Product::where('published', 1)->get();
       
        $page ='dashboard';
        return view('admin', compact('user', 'store', 'ratings', 'page', 'stores', 'products_categories', 'products_brands', 'published_products'));
    }
}
