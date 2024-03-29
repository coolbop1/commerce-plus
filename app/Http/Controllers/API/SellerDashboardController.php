<?php
   
namespace App\Http\Controllers\API;

use App\Exports\ProductsExport;
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
use App\Models\Customer;
use App\Models\Order;
use App\Models\Package;
use App\Models\RefundRequest;
use App\Models\States;
use App\Models\Store;
use App\Models\SubCategory;
use App\Models\TemporaryFiles;
use App\Models\User;
use App\Models\VendorPaymentRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        $_SESSION['vendor_current_store_id'] = $store_id ;
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
        $states = States::with('localGovts')->get();
        $files = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('vendor-shop', compact('user', 'store', 'page', 'files', 'states'));
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
        //$uploads =  Product::where('store_id', $store_id)->whereBetween('created_at', [$current_month_start, $current_month_end])->count();
        $uploads =  Product::where('store_id', $store_id)->count();
        $subscription = $store->isSubscribed() ? $store->subscriptions()->latest()->first() : null;
        $package = optional($subscription)->package;
        $remaining_uploads = $package ? ($package->product_cap - $uploads) : 0;


        return view('vendor-products', compact('user', 'store', 'page', 'remaining_uploads'));
    }

    public function productDelete($product_id)
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
        $store->products()->where('id', $product_id)->delete();
        return redirect('/seller/products');
    }

    public function digitalProducts()
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
        $page ='digitalproducts';
        $current_month_start = Carbon::now()->startOfMonth(); //Todo: This should the subscription start date ;
        $current_month_end = Carbon::now()->endOfMonth();
        $uploads =  Product::where('store_id', $store_id)->count();
        $subscription = $store->isSubscribed() ? $store->subscriptions()->latest()->first() : null;
        $package = optional($subscription)->package;
        $remaining_uploads = $package ? ($package->product_cap - $uploads) : 0;
        


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
        $files = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        if($store->isSubscribed()) {
            return view('vendor-product-create',  compact('user', 'store', 'page', 'categories', 'brands', 'product', 'files'));
        } else {
            return back();
        }
        
    }

    public function digitalProductCreate($product_id = null)
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
        $categories = Category::with('subCategories.sections')->where('name', 'software')->get();
        $brands = Brand::all();
        $product = null;
        if($product_id) {
            $product = Product::find($product_id);
        }
        $files = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('vendor-digital-product-create',  compact('user', 'store', 'page', 'categories', 'brands', 'product', 'files'));
    }

    public function show_uploader(Request $request)
    {
        return view('aiz-uploader');
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
        //session_start();
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

    public function productExport(Request $request, $store_id = null) 
    {
        if($store_id) {
            $products = Product::select('name', 'detail', 'store_id', 'category_id', 'sub_category_id', 'section_id', 'price',    'quantity','brand_id','unit','min_qty','refundable','photos','thumbnail_img','date_range','video_provider','video_link','price','discount','discount_type','sku', 'external_link', 'external_link_btn','files', 'pdf', 'meta_title', 'meta_description', 'meta_img', 'shipping_type','low_stock_quantity','stock_visibility_state','cash_on_delivery','est_shipping_days','tax','tax_type','vat','vat_type','user_id','featured','published','is_digital')->where('store_id', $store_id)->get();
        } else {
            $products = Product::select('name', 'detail', 'store_id', 'category_id', 'sub_category_id', 'section_id', 'price',    'quantity','brand_id','unit','min_qty','refundable','photos','thumbnail_img','date_range','video_provider','video_link','price','discount','discount_type','sku', 'external_link', 'external_link_btn','files', 'pdf', 'meta_title', 'meta_description', 'meta_img', 'shipping_type','low_stock_quantity','stock_visibility_state','cash_on_delivery','est_shipping_days','tax','tax_type','vat','vat_type','user_id','featured','published','is_digital')->get();
        }
        
        return Excel::download(new ProductsExport($products), 'product-collection.xlsx');
    }   

    public function toggleProductColumn(Request $request) 
    {
        $product = Product::find($request->product_id);
        $column = $request->column;
        $product->{$column} = !$product->{$column};
        $product->save();

        return $this->sendResponse([], 'Product '.$column.' column toggled successfully.');
    }

    public function productsReviews(Request $request) 
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
        $page = 'products-review';
        $carts = Cart::with('user', 'product')->whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->get();


        return view('vendor-reviews', compact('user', 'store', 'page', 'carts'));
    }

    public function uploads(Request $request) 
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
        $page = 'products-review';
        $uploads = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();


        return view('vendor-uploads', compact('user', 'store', 'page', 'uploads'));
    }

    public function uploadFile(Request $request) 
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
        $page = 'products-review';
        $uploads = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();


        return view('vendor-uploads-create', compact('user', 'store', 'page', 'uploads'));
    }

    public function deleteFile(Request $request, $id) 
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
        $page = 'products-review';

        //TODO : Find file id db before delete  Store::whereHas('users',  function($q) {$q->where('users.id', 11);})->select('shop_logo', 'banner')->get();
        $file_to_delete = TemporaryFiles::find($id);
        try {
            unlink($file_to_delete->file_path );
        } catch (\Throwable $th) {
            //throw $th;
        }
        optional($file_to_delete)->delete();
        $uploads = TemporaryFiles::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();



        return redirect('/seller/uploads');
    }

    public function deleteMultiple() 
    {
        $ids = isset($_GET['ids']) ? explode(',', $_GET['ids']) : [];
        $files_to_delete = TemporaryFiles::whereIn('id', $ids)->get();
        foreach ($files_to_delete as $key => $file) {
            try {
                unlink($file->file_path );
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        TemporaryFiles::whereIn('id', $ids)->delete();
        return redirect('/seller/uploads');
    }

    public function packages() 
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
        $page = 'packages';
        $carts = Cart::with('user', 'product')->whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->get();

        $packages = Package::all();


        return view('vendor-packages', compact('user', 'store', 'page', 'carts', 'packages'));
    } 

    public function getapproval()
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
        $page = 'approval';
        $carts = [];

        return view('vendor-get-approval', compact('user', 'store', 'page', 'carts'));
    }

    public function packagesList() 
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
        $page = 'packages';
        $carts = Cart::with('user', 'product')->whereHas('checkout', function($q) {
            $q->where('status', 'completed');
        })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->get();

        $packages = Package::all();


        return view('vendor-package-list', compact('user', 'store', 'page', 'carts', 'packages'));
    }

    public function orders()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $page = 'orders';
        $store = Store::with('products.category', 'orders')->find($store_id);
        $orders = Order::with('checkout.user', 'checkout.customer')->where('store_id', $store_id)->orderBy('id', 'DESC')->get();

        return view('vendor-orders', compact('user', 'store', 'page', 'orders'));
    }

    public function order($code)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = optional(optional($user->stores)->first())->id;
        }
        $page = 'orders';
        $store = Store::with('products.category', 'orders')->find($store_id);
        $order = Order::with('checkout.user', 'checkout.customer.state', 'delivery')->where('store_id', $store_id)->where('order_code', $code)->first();
        if(is_null($order)) {
            return back();
        }
        return view('vendor-order', compact('user', 'store', 'page', 'order'));
    }

    public function refundRequest()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $page = 'refund_request';
        $store = Store::with('products.category', 'orders')->find($store_id);
        $refund_requests = RefundRequest::with('cart.product', 'order')->where('store_id', $store_id)->get();

        return view('vendor-refund-request', compact('user', 'store', 'page', 'refund_requests'));
    }

    public function downloadInvoice($id)
    {
        $config = [];
        $font_family = "'Baloo Bhaijaan 2','sans-serif'";
        $direction = 'ltr';
        $text_align = 'left';
        $not_text_align = 'right';   

        $order = Order::with('store', 'checkout.customer.state')->where('id', $id)->first();
        info('the order '.json_encode($order));
        // return PDF::loadView('backend.invoices.invoice',[
        //     'order' => $order,
        //     'font_family' => $font_family,
        //     'direction' => $direction,
        //     'text_align' => $text_align,
        //     'not_text_align' => $not_text_align
        // ], [], $config)->download('order-'.$order->order_code.'.pdf');
        $data = [
            'order' => $order,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ];
        view()->share('data',$data);
        return PDF::loadView('invoices.invoice', $data)->download('order-'.$order->order_code.'.pdf');
    }

    public function pos() 
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
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


        return view('vendor-pos', compact('user', 'store', 'page', 'carts', 'categories', 'brands', 'states'));
    }

    public function vendorPaymentHistory() {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $page = 'pay_history';
        $store = Store::with('products.category', 'orders')->find($store_id);

        $payement_requests = VendorPaymentRequest::where('store_id', $store_id)->where('status', 'paid')->get();

        return view('vendor-payment-history', compact('user', 'store', 'page', 'payement_requests'));
    }

    public function moneyWithdrawRequest() {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->id;
        }
        $page = 'pay_history';
        $store = Store::with('products.category', 'orders')->find($store_id);

        $payement_requests = VendorPaymentRequest::where('store_id', $store_id)->get();

        return view('vendor-withdraw-request', compact('user', 'store', 'page', 'payement_requests'));
    }

}