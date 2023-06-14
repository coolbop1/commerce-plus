<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\DeliveryBoy;
use App\Models\Hub;
use App\Models\LocalGovt;
use App\Models\Order;
use App\Models\Product;
use App\Models\States;
use App\Models\Store;
use App\Models\TemporaryFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNan;

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

    public function hub()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();
        return view('admin-hubs', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs'));
    }

    public function town()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $states = States::all();
        return view('admin-towns', compact('user', 'store', 'ratings', 'page', 'stores', 'states'));
    }

    public function station()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $all_hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();
        $hubs = Hub::where('parent_id', '>', 0)->get();
        return view('admin-stations', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs', 'all_hubs'));

    }

    public function onForwarding()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $local_govts = LocalGovt::with('hub')->get();
        return view('onforwading', compact('user', 'store', 'ratings', 'page', 'stores', 'local_govts'));
    }

    public function hubCreate()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();;
        $hub = null;
        $states = States::with(['localGovts' => function($query){
            return $query->whereNull('hub_id');  
          }])->get();
        return view('admin-add-hub', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs', 'hub', 'states'));
    }

    public function stationCreate()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();;
        $hub = null;
        $states = States::with(['localGovts' => function($query){
            return $query->whereNull('hub_id');  
          }])->get();
        return view('admin-add-station', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs', 'hub', 'states'));
    
    }

    public function hubEdit($id)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $hub = Hub::find($id);
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();
        //$local_govts = LocalGovt::whereNull('hub_id')->get();
        $states = States::with(['localGovts' => function($query){
          return $query->whereNull('hub_id');  
        }])->get();
        return view('admin-add-hub', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs', 'hub', 'states'));
    }

    public function stationEdit($id)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        $page ='dashboard';
        $store = $ratings = null;
        $hub = Hub::find($id);
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();
        //$local_govts = LocalGovt::whereNull('hub_id')->get();
        $states = States::with(['localGovts' => function($query){
          return $query->whereNull('hub_id');  
        }])->get();
        return view('admin-add-station', compact('user', 'store', 'ratings', 'page', 'stores', 'hubs', 'hub', 'states'));
    }


    public function hubDelete($id)
    {
        $hub = Hub::find($id);
        $hub->delete();
        return redirect('/admin/hub');
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

    public function orders()
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
            $orders = Order::where('store_id', $store_id)->get();
        } else {
            $store = $ratings = null;
            $orders = Order::all();
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        return view('orders', compact('user', 'store', 'ratings', 'stores', 'orders'));   
    }

    public function inhouseOrders()
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
            $orders = Order::whereHas('checkout', function($query){
                $query->whereHas('carts', function($q_) {
                    $q_->whereHas('product', function($q) {
                        $q->where('in_house', 1);
                    });
                });
            })->where('store_id', $store_id)->get();
        } else {
            $store = $ratings = null;
            $orders = Order::whereHas('checkout', function($query){
                $query->whereHas('carts', function($q_) {
                    $q_->whereHas('product', function($q) {
                        $q->where('in_house', 1);
                    });
                });
            })->get();
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        return view('orders', compact('user', 'store', 'ratings', 'stores', 'orders'));   
    }

    public function sellerOrders()
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
            $orders = Order::whereHas('checkout', function($query){
                $query->whereHas('carts', function($q_) {
                    $q_->whereHas('product', function($q) {
                        $q->where('in_house', 0);
                    });
                });
            })->where('store_id', $store_id)->get();
        } else {
            $store = $ratings = null;
            $orders = Order::whereHas('checkout', function($query){
                $query->whereHas('carts', function($q_) {
                    $q_->whereHas('product', function($q) {
                        $q->where('in_house', 0);
                    });
                });
            })->get();
        }
        $stores = Store::withCount('customers', 'orders', 'products')->get();
        return view('orders', compact('user', 'store', 'ratings', 'stores', 'orders'));   
    }

    public function listOrders(Request $request)
    {
        $store_id = $request->store_id ?? null;
        //=&=&date=&search=
        $from = $to = null;
        if($request->date) {
            $date_array = explode(' to ',$request->date);
            $from = $date_array[0];
            $to = $date_array[1];
        }
        $orders = Order::when($store_id, function($q, $store_id){
            return $q->where('store_id', $store_id);
        })->when($request->delivery_status, function($q) use($request){
            return $q->whereHas('delivery', function($query) use($request){
                return $query->where('status', $request->delivery_status);
            });
        })->when($request->payment_status, function($q) use($request){
            return $q->where('payment_status', $request->payment_status);
        })->when($from && $to, function($q) use($from,$to){
            return $q->whereBetween('created_at',[$from, $to]);
        })->when($request->search, function($q) use($request){
            return $q->where('order_code', 'LIKE', '%'.$request->search.'%');
        })->get();


        return view('partials.orders-list', compact('orders'));
       
    }

    public function attachLgaToHub(Request $request, $hub_id, $lga_id)
    {
        $lgs_ids = isNan($lga_id) ? explode(',', $lga_id) : [$lga_id];

        LocalGovt::whereIn('id', $lgs_ids)->update(['hub_id' => $hub_id]);
        $hub = Hub::find($hub_id);
        $view = view('partials.attached-lga-view', compact('hub'))->render();
        $local_govt = LocalGovt::find($lgs_ids[0]);
        $state = States::find($local_govt->state_id);
        $local_govts = $state->localGovts->whereNull('hub_id');
        $is_hub = true;
    
        $options = view('partials.lga-options', compact('local_govts', 'is_hub'))->render();

        $data['options'] = $options;
        $data['view'] = $view;
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => 'Lga list retrived successfully.',
        ];


        return response()->json($response, 200);
    }

    public function detachLgaFromHub(Request $request, $hub_id, $lga_id)
    {
        $lgs_ids = isNan($lga_id) ? explode(',', $lga_id) : [$lga_id];

        LocalGovt::whereIn('id', $lgs_ids)->update(['hub_id' => null]);
        $local_govt = LocalGovt::find($lgs_ids[0]);
        $hub = Hub::find($hub_id);
        $view = view('partials.attached-lga-view', compact('hub'))->render();
        $local_govt = LocalGovt::find($lgs_ids[0]);
        $state = States::find($local_govt->state_id);
        $local_govts = $state->localGovts->whereNull('hub_id');
        $is_hub = true;
    
        $options = view('partials.lga-options', compact('local_govts', 'is_hub'))->render();

        $data['options'] = $options;
        $data['view'] = $view;
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => 'Lga list retrived successfully.',
        ];


        return response()->json($response, 200);
    }

    public function saveOnforwardingRate(Request $request, $lga_id)
    {

        if(!$request->rate || !is_numeric($request->rate)){
            $response = [
                'success' => true,
                'data'    => [],
                'message' => 'Rate Have to be a number',
            ];
        
        
            return response()->json($response, 404);
        }

        LocalGovt::where('id', $lga_id)->update(['on_forwarding' => $request->rate]);

        $response = [
            'success' => true,
            'data'    => [],
            'message' => 'Town On forwarding updated successfully.',
        ];


        return response()->json($response, 200);
    }

    public function addTownName(Request $request, $town_id = null)
    {
        if($town_id && !is_numeric($town_id)){
            $response = [
                'success' => true,
                'data'    => [],
                'message' => 'Town id Have to be a number',
            ];
        
        
            return response()->json($response, 404);
        }
        if($town_id) {
            $lga = LocalGovt::where('id', $town_id)->where('state_id', $request->state_id)->first();
            if(!$lga){
                $response = [
                    'success' => true,
                    'data'    => [],
                    'message' => 'Town not found',
                ];
                return response()->json($response, 404);
            }
            $lga->name = $request->name;
            $lga->save();

            $response = [
                'success' => true,
                'data'    => [],
                'message' => 'Town updated successfully.',
            ];
    
            return response()->json($response, 200);
        }
        LocalGovt::create([
            "name" => $request->name,
            "state_id" => $request->state_id
        ]);
        $response = [
            'success' => true,
            'data'    => [],
            'message' => 'Town saved successfully.',
        ];

        return response()->json($response, 200);
    }

    public function deleteTown(Request $request, $town_id)
    {
        if(!is_numeric($town_id)){
            $response = [
                'success' => true,
                'data'    => [],
                'message' => 'Town id Have to be a number',
            ];
        
        
            return response()->json($response, 404);
        }

        LocalGovt::where('id', $town_id)->delete();
        $response = [
            'success' => true,
            'data'    => [],
            'message' => 'Town deleted successfully.',
        ];

        return response()->json($response, 200);
    }

    public function order($code)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $stores = Store::all();
        $store = $ratings = null;
        $order = Order::with('checkout.user', 'checkout.customer.state', 'delivery')->where('order_code', $code)->first();
        return view('admin-order', compact('user', 'stores', 'order', 'store'));   
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

    public function approveStore($store_id) 
    {
        $store = Store::find($store_id);
        $store->approved = !($store->approved);
        $store->save();
        return redirect('/admin');
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
        $hubs = Hub::where('parent_id', 0)->orWhereNull('parent_id')->get();

        $page ='deliveryBoyForm';
        return view('delivery-boy-create', compact('user', 'store', 'ratings', 'page', 'stores', 'states', 'delivery_boy', 'hubs'));
    }
}
