<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CartResource;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShopWebController extends BaseController
{
    public function index($store_name)
    {
        $store_name = str_replace('-',' ', $store_name);
        $store = Store::with('products.category', 'orders')->where('name', $store_name)->first();
        $products_id = $store->products->pluck('id')->toArray();
        $ratings_data = Cart::whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->select(DB::raw('count(*) as num'), DB::raw('sum(ratings) as total_ratings'))->first();
        $total_ratings = $ratings_data->total_ratings ?? 0;
        $total_sold = $ratings_data->num;
        $ratings = $total_sold > 0 ? ($total_ratings/$total_sold) : 0;
        return view('store', compact('store', 'ratings'));
    }

}