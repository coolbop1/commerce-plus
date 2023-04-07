<?php
   
namespace App\Http\Controllers\API;
   
session_start();
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\Order;
use App\Models\PickupStation;
use App\Models\Product;
use App\Models\States;
use App\Models\User;
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
        return view('home', compact('categories', 'productsByStore', 'flash_sales', 'states', 'customers', 'user'));
    }

    public function product($product_slug)
    {
        $product_name = str_replace('_', ' ',$product_slug); 
        $product_name = str_replace('-:::-', '_',$product_name);
        $product = Product::where('name', $product_name)->first();
        $states = States::all();
        $customers = null;
        if($product) {
            $top_selling_products = Cart::with('product')->select('product_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->groupBy('product_id')->take(10)->get();
            $reviews = Cart::with('user')->where('product_id', $product->id)->whereNotNull('review_comment')->get();
            $related_products = Product::where('category_id', $product->category_id)->where('id', '<>', $product->id)->get()->take(10);
            return view('product', compact('product', 'related_products', 'top_selling_products', 'reviews', 'states', 'customers'));
        }

        return back();
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
        $orders =  Order::where('checkout_id', $checkout->id)->get();
        
        return view('orderconfirmed', compact('user', 'states', 'customers', 'pickup_stations', 'checkout', 'orders'));
    }
}