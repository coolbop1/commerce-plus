<?php
   
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CartResource;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Store;
use App\Models\SubCategory;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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

    public function productBulkUpload()
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
        $page = 'products-bulk-upload';

        return view('vendor-product-bulk-upload', compact('user', 'store', 'page'));
    }

    public function productImport(Request $request) 
    {
        session_start();
        $_SESSION['category_array'] = array_change_key_case(Category::pluck('id','name')->toArray(), CASE_LOWER);
        $_SESSION['sub_category_array'] = array_change_key_case(SubCategory::pluck('id','name')->toArray(), CASE_LOWER);
        $_SESSION['brand_array'] = array_change_key_case(Brand::pluck('id','name')->toArray(), CASE_LOWER);
        try {
            Excel::import(new ProductsImport, $request->file('file'));
        } catch (\Throwable $th) {
            return $this->sendError('Validation Error.'. $th->getMessage(), 400);  
        }
        

        return $this->sendResponse([], 'Product created successfully.');
        //return back();
    }

    public function toggleProductColumn(Request $request) 
    {
        $product = Product::find($request->product_id);
        $column = $request->column;
        $product->{$column} = !$product->{$column};
        $product->save();

        return $this->sendResponse([], 'Product '.$column.' column toggled successfully.');
    }


}