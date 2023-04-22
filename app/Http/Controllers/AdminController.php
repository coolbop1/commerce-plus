<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\DeliveryBoy;
use App\Models\Product;
use App\Models\States;
use App\Models\Store;
use App\Models\TemporaryFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('webrole:ROLE_ADMIN');
    }

    protected $in_house;

    protected  $page;
    
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

    public function categories()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $categories = Category::with('subCategories.sections')->get();
        return view('admin-categories', compact('user', 'store', 'ratings', 'page', 'stores', 'categories'));
    }

    public function brands()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $brands = Brand::all();
        return view('admin-brands', compact('user', 'store', 'ratings', 'page', 'stores', 'brands'));
    }

    public function brandEdit($brand_id)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $brand = Brand::find($brand_id);
        return view('admin-edit-brand', compact('user', 'store', 'ratings', 'page', 'stores', 'brand'));
    }

    public function brandDelete($brand_id)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $brand = Brand::find($brand_id);
        $brand->delete();
        return redirect('/admin/brands');
    }

    public function addCategories($category_id = null)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $categories = Category::with('subCategories.sections')->get();
        return view('admin-add-categories', compact('user', 'store', 'ratings', 'page', 'stores', 'categories', 'category_id'));   
    }

    public function deleteCategory($category_id = null)
    {
        $ids_array = explode('_', $category_id);
        if(count($ids_array) == 1) {
            $category = Category::find($ids_array[0]);
            $category->delete();
        }

        if(count($ids_array) == 2) {
            $category = Category::find($ids_array[0]);
            $category = $category->subCategories()->where('id', $ids_array[1])->first();
            $category->delete();
        }

        if(count($ids_array) == 3) {
            $category = Category::find($ids_array[0]);
            $category = $category->subCategories()->where('id', $ids_array[1])->first();
            $category = $category->sections()->where('id', $ids_array[2])->first();
            $category->delete();
        }

        return redirect('/admin/categories');
    }

    public function reviews()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $carts = Cart::with('product.store', 'customer.user')->whereNotNull('review_comment')->get();
        return view('reviews', compact('user', 'store', 'ratings', 'page', 'stores', 'carts'));   
    }

    public function pos() 
    {
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $stores->first()->id;
        }
        $store = Store::with('products.category', 'orders', 'customers.state')->find($store_id);
        $products_id = $store->products->pluck('id')->toArray();
        $page = 'packages';
        $carts = Cart::with('user', 'product')->whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->get();
        $categories = Category::with('subCategories.sections')->get();
        $brands = Brand::all();
        $states = States::all();


        return view('admin-pos', compact('user', 'store', 'page', 'carts', 'categories', 'brands', 'states', 'stores'));
    }

    public function products() {
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $stores->first()->id;
        }
        $store = Store::with('products.category', 'orders', 'customers.state')->find($store_id);
        $current_month_start = Carbon::now()->startOfMonth(); //Todo: This should the subscription start date ;
        $current_month_end = Carbon::now()->endOfMonth();
        //$uploads =  Product::where('store_id', $store_id)->whereBetween('created_at', [$current_month_start, $current_month_end])->count();
        $uploads =  Product::where('store_id', $store_id)->count();
        $subscription = $store->isSubscribed() ? $store->subscriptions()->latest()->first() : null;
        $package = optional($subscription)->package;
        $remaining_uploads = $package ? ($package->product_cap - $uploads) : 0;
        $page = $this->page ?? 'products';
        $is_admin = true;

        if(is_numeric($this->in_house))
        {
            $in_house = $this->in_house;
        } else {
            $in_house = null;
        }
        return view('admin-products', compact('user', 'store', 'remaining_uploads', 'stores', 'page', 'is_admin', 'in_house'));

    }

    public function inHouseProducts() {
        $this->in_house = 1;
        return $this->products();
    }

    public function sellerProducts() {
        $this->in_house = 0;
        return $this->products();
    }

    public function digitalProducts() {
        $this->page = 'digitalproducts';
        return $this->products();
    }

    public function productBulkUpload() {
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $stores->first()->id;
        }
        $store = Store::with('products.category', 'orders', 'customers.state')->find($store_id);

        $store = Store::with('products.category', 'orders')->find($store_id);
        $page = 'products-bulk-upload';

        return view('admin-product-bulk-upload', compact('user', 'store', 'page', 'stores'));
    }

    public function createProduct($product_id = null)
    {
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $stores->first()->id;
        }
        $store = Store::with('products.category', 'orders', 'customers.state')->find($store_id);
        $page = 'products';
        $categories = Category::with('subCategories.sections')->get();
        $brands = Brand::all();
        $product = null;
        if($product_id) {
            $product = Product::find($product_id);
        }
        $files = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
         return view('admin-product-create',  compact('user', 'store', 'page', 'categories', 'brands', 'product', 'files', 'stores'));
       

    }



    public function deliveryBoys($delivery_boy_id = null)
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
        if($delivery_boy_id){
            $delivery_boy = DeliveryBoy::find($delivery_boy_id);
            $delivery_boy->is_banned = !$delivery_boy->is_banned;
            $delivery_boy->save();
            return back();
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();

        $delivery_boys = DeliveryBoy::with('user')->get();

        $page ='deliveryBoys';
        return view('delivery-boys', compact('user', 'store', 'ratings', 'page', 'stores', 'delivery_boys'));

    }

    public function deliveryBoyForm($delivery_boy_id = null)
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
        $states = States::all();
        $delivery_boy = null;
        if($delivery_boy_id) {
            $delivery_boy = DeliveryBoy::find($delivery_boy_id);
        }

        $page ='deliveryBoyForm';
        return view('delivery-boy-create', compact('user', 'store', 'ratings', 'page', 'stores', 'states', 'delivery_boy'));
    }
}
