<?php
   
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CartResource;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Store;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SellerDashboardController extends BaseController
{
    public function index()
    {

        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $store = Store::with('products.category', 'orders')->find($store_id);
        $products_id = $store->products->pluck('id')->toArray();
        $ratings_data = Cart::whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->select(DB::raw('count(*) as num'), DB::raw('sum(ratings) as total_ratings'))->first();
        $total_ratings = $ratings_data->total_ratings ?? 0;
        $total_sold = $ratings_data->num;
        $ratings = $total_sold > 0 ? ($total_ratings/$total_sold) : 0;
        $page ='dashboard';


        return view('vendor-dasboard', compact('user', 'store', 'ratings', 'page'));
    }

    public function shop()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $store = Store::with('products.category', 'orders')->find($store_id);
        $page ='shop';

        return view('vendor-shop', compact('user', 'store', 'page'));
    }

    public function products()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $store = Store::with('products.category', 'orders')->find($store_id);
        $page ='products';
        $current_month_start = Carbon::now()->startOfMonth(); //Todo: This should the subscription start date ;
        $current_month_end = Carbon::now()->endOfMonth();
        $uploads = TemporaryFiles::where('user_id', $user->id)->whereBetween('created_at', [$current_month_start, $current_month_end])->count();
        $remaining_uploads = 500 - $uploads;


        return view('vendor-products', compact('user', 'store', 'page', 'remaining_uploads'));
    }

    public function productCreate($product_id = null)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $store = Store::with('products.category', 'orders')->find($store_id);
        $page = 'products';
        $categories = Category::with('subCategories.sections')->get();
        $brands = Brand::all();
        $product = null;
        if($product_id) {
            $product = Product::find($product_id);
        }

        return view('vendor-product-create',  compact('user', 'store', 'page', 'categories', 'brands', 'product'));
    }
}