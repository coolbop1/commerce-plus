<?php
   
namespace App\Http\Controllers\API;
   
//session_start();
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\Order;
use App\Models\PickupStation;
use App\Models\Product;
use App\Models\Section;
use App\Models\States;
use App\Models\Store;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    public function index()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $categories = Category::with('subCategories.sections')->take(11)->get();
        $productsByStore = Product::orderBy('created_at', 'desc')->get()->groupBy('store_id');
        $current_month_start = Carbon::now()->startOfMonth();
        $current_month_end = Carbon::now()->endOfMonth();
        $customers = null;
        $states = States::all();
        $flash_sales = Product::where('discount', '>', 0)->take(10)->get();
        $brands = Brand::take(20)->get();
        return view('home', compact('categories', 'productsByStore', 'flash_sales', 'states', 'customers', 'user', 'brands'));
    }

    public function product($product_slug)
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $product_name = str_replace('_', ' ',$product_slug); 
        $product_name = str_replace('-:::-', '_',$product_name);
        $product = Product::where('name', $product_name)->first();
        $states = States::all();
        $customers = null;
        if($product) {
            $top_selling_products = Cart::with('product')->select('product_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('product_id')->take(10)->get();
            $reviews = Cart::with('user')->where('product_id', $product->id)->whereNotNull('review_comment')->get();
            $related_products = Product::where('category_id', $product->category_id)->where('id', '<>', $product->id)->get()->take(10);
            return view('product', compact('product', 'related_products', 'top_selling_products', 'reviews', 'states', 'customers', 'user'));
        }

        return back();
    }

    public function flashDeal()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $flash_sales = Product::where('discount', '>', 0)->take(20)->get();
        $page = 'flashdeal';
        return view('flash-deal', compact('user', 'flash_sales', 'page'));
    }

    public function terms()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $website = Website::latest()->first();
        return view('terms', compact('website', 'user'));
    }

    public function returnPolicy()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $website = Website::latest()->first();
        return view('return-policy', compact('website', 'user'));
    }

    public function supportPolicy()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $website = Website::latest()->first();
        return view('support-policy', compact('website', 'user'));
    }

    public function privacyPolicy()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $website = Website::latest()->first();
        return view('privacy-policy', compact('website', 'user'));
    }

    public function stores()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $stores = Store::all();
        return view('sellers', compact('user', 'stores'));
    }
    

    public function cart()
    {
        $user = null;
        $customers = [];
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
            $customers = Customer::where('user_id', $user->id)->get();
        }
        $states = States::all();
        $pickup_stations = PickupStation::all();
        return view('cart', compact('user', 'states', 'customers', 'pickup_stations'));
    }

    public function checkout()
    {
        $user = null;
        $customers = [];
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
            $customers = Customer::where('user_id', $user->id)->get();
        }
        $states = States::all();
        $pickup_stations = PickupStation::all();
        
        return view('checkout', compact('user', 'states', 'customers', 'pickup_stations'));
    }

    public function checkoutDeliveryInfo() 
    {
        $user = null;
        $customers = [];
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
            $customers = Customer::where('user_id', $user->id)->get();
        }
        $states = States::all();
        $pickup_stations = PickupStation::all();
        
        return view('deliveryInfo', compact('user', 'states', 'customers', 'pickup_stations'));
    }

    public function checkoutPaymentSelect()
    {
        $user = null;
        $customers = [];
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
            $customers = Customer::where('user_id', $user->id)->get();
        }
        $states = States::all();
        $pickup_stations = PickupStation::all();
        
        return view('paymentselect', compact('user', 'states', 'customers', 'pickup_stations'));
    }

    public function checkoutOrderConfirmed()
    {
        $user = null;
        $customers = [];
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
            $customers = Customer::where('user_id', $user->id)->get();
        }
        $states = States::all();
        $pickup_stations = PickupStation::all();

        $checkout = Checkout::with('carts')->where('user_id', $user->id)->where('status', 'pending')->latest()->first();
        if(is_null($checkout)) {
            return redirect('/');
        }
        $orders =  Order::where('checkout_id', $checkout->id)->get();
        
        return view('orderconfirmed', compact('user', 'states', 'customers', 'pickup_stations', 'checkout', 'orders'));
    }

    public function category($category_slug)
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $category_name = str_replace('-',' ', $category_slug);
        $category_name = str_replace(':::', '-', $category_name);
        $category = Category::with('products')->where('name', $category_name)->first() ?? SubCategory::with('products')->where('name', $category_name)->first() ?? Section::with('products')->where('name', $category_name)->first();
        if(is_null($category->category_id) && is_null($category->sub_category_id)) {
            $type = 'category';
            $sibling_category = SubCategory::where('category_id', $category->id)->get();
        } elseif ($category->category_id) {
            $type = 'sub_category';
            $sibling_category = Section::where('sub_category_id', $category->id)->get();
        } else {
            $type = 'section';
            $sibling_category = [];
        }
        $brands = Brand::all();

        return view('category-product', compact('user', 'category', 'sibling_category', 'type', 'brands'));
    }

    public function brands()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $brands = Brand::all();
        return view('brand-list', compact('user', 'brands'));
    }

    public function brand($brand_slug)
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $brand_name = str_replace('-',' ', $brand_slug);
        $brand = Brand::with('products')->where('name', $brand_name)->first();
        $categories = Category::all();
        return view('brand-product', compact('user', 'categories', 'brand'));
    }
}