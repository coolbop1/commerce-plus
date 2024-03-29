<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CartResource;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\CancelledDelivery;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryBoy;
use App\Models\Hub;
use App\Models\LocalGovt;
use App\Models\Order;
use App\Models\Package;
use App\Models\PodRecord;
use App\Models\RechargeHistory;
use App\Models\RefundRequest;
use App\Models\RouteTrail;
use App\Models\Store;
use App\Models\Subscription;
use App\Models\TemporaryFiles;
use App\Models\User;
use App\Models\VendorPaymentRequest;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderProcessed;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class StoreController extends BaseController
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'shop_name' => 'required',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'nullable|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        if(!is_numeric($request->state_id)) {
            $input['state_id'] = explode('_', $request->state_id)[0];
            $input['local_govt_id'] = explode('_', $request->state_id)[1];
        }
        $input['user_id'] = $request->user()->id;
        $already_exist = Store::where('name', $request->shop_name)->first();
        if( $already_exist) {
            return $this->sendError('Store with the same name already exist, please edit the store name.', [], 400);  
        }

        $store = Store::updateOrCreate(
            [
                'name' => $request->shop_name,
            ],
            $input
        );
        if($store) {
            $user = User::find($request->user()->id);
            $user->stores()->attach($store->id);
        }


        return $this->sendResponse($store, 'Store created successfully.');
    }

    public function updateStore(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'required|integer',
            'local_govt_id' => 'required|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
            'shop_logo' => 'nullable|string',
            'shop_phone' => 'nullable|string',
            'shop_address' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string', 
            'banner' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'google' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $store = Store::find($id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }
        if($request->shop_logo){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->shop_logo))->orWhereIn('file_path', explode(',', $request->shop_logo))->latest()->first();
            $request_shop_logo = $temp->file_path ?? null;
        }
        if($request->banner){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->banner))->orWhereIn('file_path', explode(',', $request->banner))->pluck('file_path')->toArray();
            $request_shop_banner = count($temp) > 0 ? implode(',', $temp) : null;
        }
        $store->update([
            'name' => $request->name ?? $store->name,
            'user_id' => $request->user_id ?? $store->user_id,
            'warehoused' => $request->warehoused ?? $store->warehoused,
            'state_id' => $request->state_id,
            'local_govt_id' => $request->local_govt_id,
            'lat' => $request->lat ?? $store->lat,
            'long' => $request->long ?? $store->long,
            'shop_logo' => $request_shop_logo ?? $store->shop_logo,
            'shop_phone' => $request->shop_phone ?? $store->shop_phone,
            'shop_address' => $request->shop_address ?? $store->shop_address,
            'meta_title' => $request->meta_title ?? $store->meta_title,
            'meta_description' => $request->meta_description ?? $store->meta_description,
            'banner' => $request_shop_banner ?? $store->banner,
            'facebook' => $request->facebook ?? $store->facebook,
            'instagram' => $request->instagram ?? $store->instagram,
            'twitter' => $request->twitter ?? $store->twitter,
            'google' => $request->google ?? $store->google,
            'youtube' => $request->youtube ?? $store->youtube,
        ]);
        $store = Store::find($id);

        return $this->sendResponse($store, 'Store edited successfully.');
    }

    public function listStores(){
        $stores = Store::all();
    
        return $this->sendResponse($stores, 'Stores retrieved successfully.');
    }

    public function viewStore($id) {
        $store = Store::find($id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }

        return $this->sendResponse($store, 'Store retrieved successfully.');
    }

    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|integer',
            'store_id' => 'required|integer',
            'payment_type' => 'required|string',
            'reference' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $user_id = $request->user()->id;
        $package = Package::find($request->package_id);
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$request->reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".env('PAYSTACK_SECRET_KEY'),
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {
            //echo "cURL Error #:" . $err;
            return $this->sendError('Validation Error.', $err, 400);
        } else {
            //echo $response;
            info('reponse'.json_encode($response));
            $response = json_decode($response) ;
            if($response->status == true) {
                $store = Store::find($request->store_id);
                $existing_subscription = $store->subscriptions()
                ->whereDate('expiry_date',  '>', Carbon::now())->latest()->first();
                $subscribe = Subscription::create([
                    "store_id" => $request->store_id,
                    "package_id" => $request->package_id,
                    "subscription_amount" => $package->price,
                    "is_active" => in_array($request->payment_type, ['paystack', 'flutterwave']),
                    "payment_type" => $request->payment_type,
                    'reference' => $request->reference,
                    'start_date' => optional($existing_subscription)->expiry_date ?? now(),
                    'expiry_date' => Carbon::parse(optional($existing_subscription)->expiry_date ?? now())->addDays($package->days)
                ]);
                if($subscribe) {
                    return $this->sendResponse($subscribe, 'Subscription successfull.');
                }
            }
        }
    }

    public function createCustomer(Request $request) {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'nullable|string', 
            'customer_id' => 'nullable|integer', 
            'user_id' => 'nullable|integer', 
            'address' => 'required', 
            'state_id' => 'required|integer', 
            'local_govt_id' => 'required|integer', 
            'store_id' => 'required|integer', 
            'phone' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        if($request->has('customer_id') && is_numeric($request->customer_id)) {
            $customer = Customer::where('id', $request->customer_id)->update([
                'customer_name' => $request->customer_name, 
                'user_id' => $request->user_id, 
                'address' => $request->address, 
                'state_id' => $request->state_id, 
                'store_id' => $request->store_id, 
                'phone' => $request->phone,
                'local_govt_id' => $request->local_govt_id
            ]);
        } else {
            $customer = Customer::create([
                'customer_name' => $request->customer_name, 
                'user_id' => $request->user_id, 
                'address' => $request->address, 
                'state_id' => $request->state_id, 
                'store_id' => $request->store_id, 
                'phone' => $request->phone,
                'local_govt_id' => $request->local_govt_id
            ]);
        }
       
        return $this->sendResponse($customer, 'Customer added successfully.');
    }

    public function posOrder(Request $request) {
        $all_cart_items = Cart::where('session', $request->session)->whereNull('checkout_id')->get();

        $request->merge([
            'all_cart_items' => $all_cart_items, 
            'customer_id' => optional($all_cart_items->first())->customer_id,
            'order_type' => $request->order_type,
            'store_id' => $_SESSION['vendor_current_store_id']
        ]);
        $validator = Validator::make($request->all(), [
            'all_cart_items' => 'required', 
            'customer_id' => 'required|integer',
            'order_type' => 'required|in:cod,card,cash,offline',
            'store_id' => 'required|integer',
            'payment_refrence' => 'required_if:order_type,card'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $carts_ = (new CartController())->getMyCart($request, null, $internal = true, $all_cart_items->pluck('id')->toArray());
        $customer = Customer::find($request->customer_id);
        if(!$customer) {
            return $this->sendError('Customer not found.', $validator->errors(), 404); 
        }
        $cart_products = $request->all_cart_items;
        $unique_product_ids = $cart_products->pluck('product_id')->unique()->toArray();
        $products_picked = Product::whereIn('id',  $unique_product_ids)->get();
        if(count($unique_product_ids) != $products_picked->count()) {
            return $this->sendError('Products not found.', $validator->errors(), 404); 
        }
        $total_amount = 0;
        $temp_checkout_id = $request->store_id.'_'.time();
        $order_cart = [];
        $input['customer_id'] = $request->customer_id;
        $input['cart_type'] = 'pos';
        $input['checkout_id'] = 1;
        foreach ($cart_products as $key => $cart_item) {
            $product = $products_picked->where('id', $cart_item->product_id)->first();
            $input['review_comment'] = $temp_checkout_id;
            $input['product_id'] = $product->id;
            $input['qty'] = $cart_item->qty;
            $hasError = $cart_item->qty > $product->quantity;
            if($hasError) {
                return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
            }
            $hasError = $cart_item->qty < $product->min_qty; 
            if($hasError) {
                return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
            }
            // $hasInvalidPrice = $cart_item->price < $product->newPrice();
            // if($hasInvalidPrice) {
            //     return $this->sendError('A selected Product has wrong Price, please refresh and try again.'.$product->newPrice(), $validator->errors(), 404); 
            // }
            $order_cart[] = $input;
            $total_amount += $cart_item->qty * $product->newPrice();
        }
        
        
        Cart::insert($order_cart);

        $checkout = Checkout::create([
            'customer_id' => $request->customer_id, 
            'phone' => $customer->phone, 
            'address' => $customer->address, 
            'order_type' => $request->order_type, 
            'payment_refrence' => $request->payment_refrence ?? null,
            'state_id' =>  $customer->state_id,
            'checkout_type' => 'pos',
            'total_amount' => $total_amount,
            'shipping' => $carts_ ['shipping']
        ]);
        Cart::where('review_comment', $temp_checkout_id)->update(['checkout_id' => $checkout->id, 'review_comment' => null]);

        $order = Order::create([
            'store_id' => $request->store_id, 
            'checkout_id' => $checkout->id, 
            'amount' => $total_amount,
            'status' => 'accepted',
            'order_code' => $request->store_id.'-'.Carbon::parse(now())->format("Ymd").'-'.time(),
            'payment_status' => $request->order_type == 'cod' ? 'unpaid' : 'paid',
            'shipping' => $carts_['shipping']
        ]);
        
        return $this->sendResponse($order, 'Order added successfully.');

    }

    public function setCustomerId(Request $request) {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|numeric'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $user = $request->user();
        $all_cart_items = $user->carts->whereNull('checkout_id');

        $customer = Customer::find($request->customer_id);
        if(!$customer && $request->cart_type == 'physical') {
            return $this->sendError('Customer not found.', $validator->errors(), 404); 
        }
        Cart::whereIn('id', $all_cart_items->pluck('id')->toArray())->update(['customer_id' => $request->customer_id]);
        return $this->sendResponse([], 'Cart updated successfully.');
    }

    public function submitOrder(Request $request) {
        $user = $request->user();
        $all_cart_items = $user->carts->whereNull('checkout_id');

        $request->merge([
            'all_cart_items' => $all_cart_items, 
            'customer_id' => optional($all_cart_items->first())->customer_id,
            'cart_type' => optional(optional($all_cart_items->first())->product)->is_digital ? 'digital' : 'physical'
        ]);
        if(isset($_SESSION['hub_id'])) {
            $request->merge([
                'delivery_type' => 'pickup_point',
                'pick_point_id' => $_SESSION['hub_id']
            ]);
        } else {
            $request->merge(['delivery_type' => 'home_delivery']);
        }
        $validator = Validator::make($request->all(), [
            'cart_type' => 'required',
            'customer_id' => 'required_unless:cart_type,digital|integer', 
            'all_cart_items' => 'required', 
            'order_type' => 'required|in:cod,card,cash,offline,wallet',
            'payment_refrence' => 'required_if:order_type,card',
            'delivery_type' => 'required_unless:cart_type,digital|in:home_delivery,pickup_point',
            'pick_point_id' => 'required_if:delivery_type,pickup_point',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $customer = Customer::find($request->customer_id);
        if(!$customer && $request->cart_type == 'physical') {
            return $this->sendError('Customer not found.', $validator->errors(), 404); 
        }
        $cart_products = $request->all_cart_items;
        $cart_products_ = $cart_products;
        $unique_product_ids = $cart_products->pluck('product_id')->unique()->toArray();
        $products_picked = Product::whereIn('id',  $unique_product_ids)->get();
        if(count($unique_product_ids) != $products_picked->count()) {
            return $this->sendError('Products not found.', $validator->errors(), 404); 
        }
        $products_grouped_by_store = $products_picked->groupBy('store_id');
        $user_carts = (new CartController())->getMyCart($request, null, $internal = true);
        $checkout = Checkout::create([
            'customer_id' => $request->customer_id, 
            'user_id' => $request->user()->id,
            'phone' => $customer->phone ?? $request->user()->phone, 
            'address' => $customer->address ?? '', 
            'order_type' => $request->order_type, 
            'payment_refrence' => $request->payment_refrence ?? null,
            'state_id' =>  $customer->state_id ?? 1,
            'checkout_type' => 'online',
            'total_amount' => 10,
        ]);


        foreach ($products_grouped_by_store as $store_id => $products) {
            $product_ids = collect($products)->pluck('id')->toArray();
            $cart_products = $cart_products_ ->whereIn('product_id', $product_ids);
            $carts_ = (new CartController())->getMyCart($request, null, $internal = true, $cart_products->pluck('id')->toArray());
            $total_amount = 0;
            
            $order_cart = [];
            $input['user_id'] = $request->user()->id;
            $input['customer_id'] = $request->customer_id;
            $input['cart_type'] = 'online';
            $input['checkout_id'] = 1;
            foreach ($cart_products as $key => $cart_item) {
                $product = $products_picked->where('id', $cart_item->product_id)->first();
                $input['checkout_id'] = $checkout->id;
                $cart_item->checkout_id = $checkout->id;
                $input['product_id'] = $product->id;
                $input['qty'] = $cart_item->qty;
                $hasError = $cart_item->qty > $product->quantity;
                if($hasError) {
                    return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
                }
                $hasError = $cart_item->qty < $product->min_qty; 
                if($hasError) {
                    return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
                }
                // $hasInvalidPrice = $cart_item->price < $product->newPrice();
                // if($hasInvalidPrice) {
                //     return $this->sendError('A selected Product has wrong Price, please refresh and try again.'.$product->newPrice(), $validator->errors(), 404); 
                // }
                $order_cart[] = $input;
                $total_amount += $cart_item->qty * $product->newPrice();
                $product->quantity -= $cart_item->qty;
                $product->save();
                $cart_item->save();
            }
            
            //Cart::insert($order_cart);
            $order = Order::create([
                'store_id' => $store_id, 
                'checkout_id' => $checkout->id, 
                'amount' => $total_amount,
                'status' => $request->cart_type == 'digital' ? 'accepted' : 'pending',
                'order_code' => $store_id.'-'.Carbon::parse(now())->format("Ymd").'-'.time(),
                'payment_status' => $request->order_type == 'cod' ? 'unpaid' : 'paid',
                'shipping' => $carts_['shipping']
            ]);
        }
        $all_total =  Order::where('checkout_id', $checkout->id)->sum('amount');
        $checkout->total_amount = $all_total;
        $total_amount = $user_carts["total_amount"];
        $shipping = $user_carts["shipping"];
        $checkout->shipping = $shipping;
        if($request->pick_point_id){
            $checkout->hub_id = $request->pick_point_id;
        }
        $checkout->save();
        if($request->order_type == 'wallet') {
            $remaining_balance = $request->user()->balance - $total_amount;
            User::where('id', $request->user()->id)->update(['balance' => $remaining_balance]);
        }
        $admin = User::whereHas('roles', function($q){ $q->where('name', 'ROLE_SUPERADMIN');})->first();
        $store = Store::find($store_id);
        $store->notify(new OrderPlaced($order));
        $admin->notify(new OrderPlaced($order, $is_admin = true));
        return $this->sendResponse($checkout, 'Order added successfully.');
    }

    public function rechargeWallet(Request $request) {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $payment_reference = $request->payment_reference ?? null;
        $user_id = $request->user()->id ?? $request->user_id;
        $user = User::find($user_id);
        $user->balance += $request->amount;
        $user->save();
        RechargeHistory::create([
            'amount' => $request->amount,
            'user_id' => $user_id,
            'payment_reference' => $payment_reference,
            'transaction' => 'credit'
        ]);
        return $this->sendResponse([], 'Recharge wallet succesfully.');
    }











    public function validateCart(Request $request) {
        $user = $request->user();
        $all_cart_items = $user->carts->whereNull('checkout_id');

        $request->merge([
            'all_cart_items' => $all_cart_items, 
            'customer_id' => optional($all_cart_items->first())->customer_id  ,
            'cart_type' => optional(optional($all_cart_items->first())->product)->is_digital ? 'digital' : 'physical'
        ]);
        $validator = Validator::make($request->all(), [
            'cart_type' => 'required',
            'customer_id' => 'required_unless:cart_type,digital|integer', 
            'all_cart_items' => 'required',
            'payment_type' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $cart_products = $request->all_cart_items;
        $unique_product_ids = $cart_products->pluck('product_id')->unique()->toArray();
        $products_picked = Product::whereIn('id',  $unique_product_ids)->get();
        if(count($unique_product_ids) != $products_picked->count()) {
            return $this->sendError('Products not found.', $validator->errors(), 404); 
        }
        $user_carts = (new CartController())->getMyCart($request, null, $internal = true);
        $total_amount = $user_carts["total_amount"];
        //$temp_checkout_id = $request->store_id.'_'.time();
        $order_cart = [];
        $input['customer_id'] = $request->customer_id;
        $input['cart_type'] = 'online';
        $input['checkout_id'] = 1;
        foreach ($cart_products as $key => $cart_item) {
            $product = $products_picked->where('id', $cart_item->product_id)->first();
            //$input['review_comment'] = $temp_checkout_id;
            $input['product_id'] = $product->id;
            $input['quantity_added'] = $cart_item->qty;
            $input['is_digital'] = $cart_item->product->is_digital;
            $hasError = $cart_item->qty > $product->quantity;
            if($hasError) {
                return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
            }
            $hasError = $cart_item->qty < $product->min_qty; 
            if($hasError) {
                return $this->sendError('A selected Product has invalid quantity selected, please refresh and try again.', $validator->errors(), 404); 
            }
            // $hasInvalidPrice = $cart_item->price < $product->newPrice();
            // if($hasInvalidPrice) {
            //     return $this->sendError('A selected Product has wrong Price, please refresh and try again.'.$product->newPrice(), $validator->errors(), 404); 
            // }
            $order_cart[] = $input;
           // $total_amount += $cart_item->qty * $product->newPrice();
        }
        if ($request->payment_type =='wallet' && $request->user()->balance < $total_amount) {
            return $this->sendError('Yo have Insufficient balance in your wallet to place this order, Please recharge', $validator->errors(), 400);
        }
        return $this->sendResponse(["subtotal" => $total_amount, "cart" => $request->all_cart_items], 'Refund request updated successfully.');
    }

    public function toggleRefundApproval(Request $request) {
        $validator = Validator::make($request->all(), [
            'refund_request_id' => 'required|integer',
            'status' => 'required|in:accepted,pending,rejected'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $refund_request = RefundRequest::find($request->refund_request_id);
        if(!$refund_request) {
            return $this->sendError('Refun request not found', $validator->errors(), 404); 
        }
        $refund_request->update(['status' => $request->status]);
        return $this->sendResponse($refund_request, 'Refund request updated successfully.');
    }

    public function withdrawalRequest(Request $request, $store_id) {
        $store = Store::find($store_id);
        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }
        if(!($request->user()->isStoreAdmin($store_id))) {
            return $this->sendError('Unathorized', [], 401);
        }
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|gt:0|lte:'.$store->balance,
            'message' => 'nullable'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $withdrawalRequest = VendorPaymentRequest::create([
            'store_id' => $store_id,
            'amount' => $request->amount,
            'message' => $request->message ?? null,
        ]);

        return $this->sendResponse($withdrawalRequest, 'Withdrawal request placed successfully.');
    }

    public function updateOrderStatus(Request $request, $order_id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,accepted,declined,out_for_delivery'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $order = Order::find($order_id);
        $order->status = $request->status;
        if($order->status == 'accepted') {
            $delivery = Delivery::firstOrCreate([
                'order_id' => $order->id,
            ]);
            $order->delivery_id = $delivery->id;
            $delivery_string = $this->randomStrings(10);
            $order->pod = $delivery_string;
            $pod_record = PodRecord::create([
                'customer_id' => $order->checkout->customer->id,
                'delivery_id' => $delivery->id,
                'pod' => bcrypt($delivery_string)
            ]);

            $delivery->pod_record_id = $pod_record->id;
            $delivery->save();
            $order->checkout->customer->notify(new OrderProcessed($order));
            $this->addRouteTrail($order->id, null, false, $request->accept_type == 'dropoff');
        } 
        if($order->status == 'out_for_delivery') {
            Delivery::where('order_id', $order->id)->update(['status' => 'picked_up']);
            $delivery_boy = DeliveryBoy::where('user_id', $request->user()->id)->first();
            $this->addRouteTrail($order->id, $delivery_boy->id);
        }


        $order->save();
        
        
        
        return $this->sendResponse($order, 'Order status updated successfully.');
    }

    public function addRouteTrail($order_id, $delivery_boy_id = null, $delivered = false, $dropOff = false) {
        $order = Order::find($order_id);
        
        $user_id = optional(optional($order)->checkout)->user_id ?? optional(optional(optional($order)->checkout)->customer)->user_id;; 
        $user_ = User::find($user_id);
        $request = new Request();
        $request->merge(['user' => $user_]);
        $carts_id = $order->checkout->carts->pluck('id')->toArray();
        $request->setUserResolver(function () use ($user_) {
            return $user_;
        });
        $user_carts = (new CartController())->getMyCart($request, $user_id, $internal = true, $carts_id, $track = true);
        $track = $user_carts['track'] ?? [];
        info("The track ",$track);
        $route_trails = RouteTrail::where('order_id', $order->id)->get();
        if(is_null($delivery_boy_id) && !$delivered) {
            $destination_node = $route_trails->count() == 0 ? 1 : ($route_trails->count() + 1);
            $origin_node = $destination_node - 1;
            if(isset($track[$destination_node]))
            RouteTrail::create([
                "order_id" => $order->id,
                "origin_type" => $track[$origin_node]['type'] ?? 'station',
                "origin_hub_id" => $track[$origin_node]['type'] == 'station' ? $track[$origin_node]['parent_id'] : ($track[$origin_node]['type'] == 'town' ? $track[$origin_node]['hub']['parent_id'] : $track[$origin_node]['id']),
                "origin_station_id" => $track[$origin_node]['type'] == 'station' ? $track[$origin_node]['id'] : ($track[$origin_node]['type'] == 'town' ? $track[$origin_node]['hub_id'] : null),
                "origin_town_id" => $track[$origin_node]['type'] == 'station' ? null : ($track[$origin_node]['type'] == 'town' ? $track[$origin_node]['id'] : null),
                "destination_type" => $track[$destination_node]['type'] ?? 'station',
                "destination_hub_id" => $track[$destination_node]['type'] == 'station' ? $track[$destination_node]['parent_id'] : ($track[$destination_node]['type'] == 'town' ? $track[$destination_node]['hub']['parent_id'] : $track[$destination_node]['id']),
                "destination_station_id" => $track[$destination_node]['type'] == 'station' ? $track[$destination_node]['id'] : ($track[$destination_node]['type'] == 'town' ? $track[$destination_node]['hub_id'] : null),
                "destination_town_id" => $track[$destination_node]['type'] == 'station' ? null : ($track[$destination_node]['type'] == 'town' ? $track[$destination_node]['id'] : null),
                "status" => $dropOff ? "awaiting_delivery" : "in_transit"
            ]);
        } elseif(!$delivered) {
            info("order here ... ".json_encode($order));
            $route_trail = RouteTrail::where('order_id', $order->id)->where('status', '<>', 'delivered')->latest()->first();
            if($route_trail->delivery_boy_id) {
                $route_trail->status = 'awaiting_delivery';
            }
            $route_trail->delivery_boy_id = $route_trail->delivery_boy_id ?? $delivery_boy_id;
            $route_trail->save();
        } else {
            $delivery_boy = DeliveryBoy::find($delivery_boy_id);
            $route_trail = RouteTrail::where('order_id', $order->id)->when(optional($delivery_boy)->is_operator, function($q) use($delivery_boy_id){
                return $q->where('delivery_boy_id', $delivery_boy_id)->orWhereNull('delivery_boy_id');
            }, function($q) use($delivery_boy_id){
                return $q->where('delivery_boy_id', $delivery_boy_id);
            })->latest()->first();
            $route_trail->status = 'delivered';
            $route_trail->save();
        }
        return isset($route_trail) && !is_null($route_trail->destination_town_id);
    }

    public function updateDeliveryStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,picked_up,on_the_way,delivered,assigned',
            'pod' => 'required_if:status,delivered'
        ]);
        $delivery_boy = $request->delivery_boy_id ? DeliveryBoy::find($request->delivery_boy_id) : DeliveryBoy::where('user_id', $request->user()->id)->first();
        info('delivery_boy '.json_encode($delivery_boy));
        if(!($delivery_boy->is_operator) && $validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        
        if(is_null($delivery_boy)) {
            return $this->sendError('Unathorized', [], 401);
        }

        $route_trail = $id ? RouteTrail::find($id) : RouteTrail::where('id', $id)->where(function($query) use($delivery_boy){
            $query->whereNull('delivery_boy_id')->orWhere('delivery_boy_id', $delivery_boy->id);
        })->first();
        $order_ = $route_trail->order;
        $delivery = $order_->delivery;
        if(is_null($delivery)) {
            return $this->sendError('Delivery not found', [], 404);
        }
        switch ($request->status) {
            case 'delivered':
                $customer = $delivery->order->checkout->customer;
                $podRecord = PodRecord::where('expired', 0)->where('customer_id', $customer->id)->where('delivery_id', $delivery->id)->first();
                if(is_null($podRecord) && !($delivery_boy->is_operator)) {
                    return $this->sendError('Delivery Proof not found', [], 404);
                }
                if(!password_verify($request->pod, $podRecord->pod) && !($delivery_boy->is_operator)) {
                    return $this->sendError('Incorrect delivery code. Unauthorized', [], 401);
                }
                $order = $delivery->order;
                if($this->addRouteTrail($order->id, $route_trail->delivery_boy_id ?? $delivery_boy->id, true)) {
                    $podRecord->update(['expired' => true]);
                    $delivery->status = $request->status;
                    $delivery->pod = $request->pod;
                    $delivery->save();
                    $delivery->order()->update(['status' => 'delivered']);
                    if($delivery->order->checkout->order_type == 'cod') {
                        //TODo something
                    }
                } else {
                    $this->addRouteTrail($order->id);
                }
                break;
            case 'assigned':
                CancelledDelivery::where('delivery_id', $delivery->id)->where('delivery_boy_id', $delivery_boy->id)->delete();
                $delivery->delivery_boy_id = $delivery_boy->id;
                $delivery->save();
                $order = $delivery->order;
                $this->addRouteTrail($order->id, $delivery_boy->id);
                break;
            
            default:
            $delivery->status = $request->status;
            $delivery->save();
            $order = $delivery->order;
            $this->addRouteTrail($order->id, $delivery_boy->id);
                break;
        }

        

        return $this->sendResponse($delivery, 'Delivery status updated successfully.');
    }

    public function randomStrings($length_of_string)
    {
     
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                           0, $length_of_string);
    }
}