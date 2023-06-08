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
use App\Models\Customer;
use App\Models\Hub;
use App\Models\States;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CartController extends BaseController
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['addItemToCartNoauth', 'getMyCart']);
    }

    public function addItemToCartNoauth(Request $request)
    {
        info("get to controller");
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        if($request->user()){
            $input['user_id'] = $request->user()->id;
        }
        $product_picked = Product::find($request->product_id);
        if(is_null($product_picked)){
            return $this->sendError('Product not found', [], 404);  
        }
        $already_saved = $request->session ? Cart::whereNull('checkout_id')->where('session', $request->session)->get() : Cart::whereNull('checkout_id')->where('user_id', $request->user()->id)->get();
        if($already_saved->count() > 0 && $already_saved->first()->product->is_digital != $product_picked->is_digital){
            return $this->sendError('Cant cart digital product and non digital product together', [], 400); 
        }
        
        $already_saved = $already_saved->where('product_id', $request->product_id)->whereNull('checkout_id')->first();
        if($already_saved && (($request->quantity ?? ($already_saved->qty + 1)) > $product_picked->quantity)) {
            return $this->sendError('Available Product quantity not up to '.($request->quantity ?? ($already_saved->qty + 1)), [], 400);
        }
        if($already_saved) {
            $already_saved->qty = ($request->quantity ?? ($already_saved->qty + 1));
            $already_saved->save();
        } else {
            Cart::create($input);
        }
        return $this->sendResponse([], 'Cart saved successfully.');
    
    }

    public function addItemToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        $input['user_id'] = $request->user()->id;

        Cart::create($input);

        return $this->getMyCart($request, $input['user_id']);
    
    }

    public function removeItemFromCart(Request $request, $user_id = null)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $c_user_id = $request->user()->id ?? $user_id;
        $cart = $request->user() ? Cart::where('user_id', $c_user_id)->where('product_id', $request->product_id)->first() : Cart::where('session', $c_user_id)->where('product_id', $request->product_id)->first();
        if(is_null($cart)){
            return $this->sendError('Cart not found.', [], 400);
        }
        if($cart->qty == 1 || $request->remove) {
            $cart->delete();
        } else {
            $cart->qty = $cart->qty - 1;
            $cart->save();
        }
        return $this->sendResponse([], 'Product removed successfully.');
    }

    public function getMyCart(Request $request, $user_id = null, $internal = false, $selected_id = [])
    {
        $c_user_id = $request->user()->id ?? $user_id;

        if(is_null($c_user_id)) {
            return $this->sendError('Cart not found', [], 404);  
        }
        $carts = $request->user() ? Cart::with('product')->where('user_id', $c_user_id)->whereNull('checkout_id')->get() : Cart::where('session', $c_user_id)->whereNull('checkout_id')->get();
        info("carts $c_user_id ".json_encode($carts));
        if(count($selected_id) > 0) {
            $carts = Cart::whereIn('id', $selected_id)->get();
        }
        
        $carts_ = CartResource::collection($carts);
        $total_price = collect(json_decode(json_encode($carts_), true))->sum('price');
        $total_weight = collect(json_decode(json_encode($carts_), true))->sum('weight');
        $shipping = collect(json_decode(json_encode($carts_), true))->sum('ship');
        if($request->user()) {
            $cart = $carts->first();
            $hub = isset($_SESSION['hub_id']) ? $_SESSION['hub_id'] : optional(optional(optional(optional($cart)->customer)->lga)->hub)->parent_id;
        
            if($hub && $cart && !($cart->product->is_digital)) {
                $customer_hub = Hub::find($hub);
                switch (true) {
                    case $total_weight <= 2:
                        $shipping += is_numeric($customer_hub->small) ? $customer_hub->small : eval("return ".str_replace('kg', $total_weight, $customer_hub->small).";");
                        break;
                    case $total_weight <= 7:
                        $shipping += is_numeric($customer_hub->medium) ? $customer_hub->medium : eval("return ".str_replace('kg', $total_weight, $customer_hub->medium).";");
                        break;
                    case $total_weight <= 10:
                        $shipping += is_numeric($customer_hub->large) ? $customer_hub->large : eval("return ".str_replace('kg', $total_weight, $customer_hub->large).";");
                        break;
                    
                    default:
                    $shipping += is_numeric($customer_hub->heavy) ? $customer_hub->heavy : eval("return ".str_replace('kg', $total_weight, $customer_hub->heavy).";");
                        break;
                }
            }
        }
        $total_amount = $shipping + $total_price;
        if(!$internal){
            $data['view'] = view('partials.top-cart', compact('carts', 'total_price', 'shipping'))->render();
            $data['page'] = view('partials.cart', compact('carts', 'total_price'))->render();
            $data['product_list'] = view('partials.product-list', compact('carts', 'total_price'))->render();
            $data['payment_cart_list'] = view('partials.payment-cart-list-card', compact('carts', 'total_price'))->render();
            $data['pos_cart'] = view('partials.pos-cart', compact('carts', 'total_price', 'shipping', 'total_amount'))->render();
            $data['pos_order_cart'] = view('partials.pos-order-cart', compact('carts', 'total_price', 'shipping', 'total_amount'))->render();
        }
        $data['items'] = $carts;
        $data['total_price'] = $internal ? $total_price : number_format($total_price, 2);
        $data['shipping'] = $internal ? $shipping : number_format($shipping, 2);
        $data['total_amount'] = $internal ? ($shipping + $total_price) : number_format(($shipping + $total_price), 2);
        if($internal){
            return $data;
        }
        
        return $this->sendResponse($data, 'Cart retrived successfully.');
    }

    public function getMyaddress(Request $request, $customer_id) 
    {
        $user = $request->user();
        $customer = $user->customer->where('id', $customer_id)->first();
        if(is_null($customer)){
            return $this->sendError('Customer not found', [], 404);
        }
        $states = States::all();
        $form = view('partials.edit-customer-form', compact('customer', 'states'))->render();
        $data['form'] = $form;
        $data['data'] = $customer;

        return $this->sendResponse($data, 'Customer retrived successfully.');
    }

    public function addAddress(Request $request, $customer_id = null) 
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required', 
            'state_id' => 'required|integer',
            'local_govt_id' => 'required|integer',
            'phone' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        if($customer_id) {
            Customer::where('user_id', $request->user()->id)->where('id', $customer_id)
            ->update([
                'address' => $request->address, 
                'state_id' => $request->state_id,
                'local_govt_id' => $request->local_govt_id,
                'store_id' => 0, 
                'phone' => $request->phone
            ]);
        } else {
            Customer::create([
                'user_id' => $request->user()->id,
                'address' => $request->address, 
                'state_id' => $request->state_id,
                'local_govt_id' => $request->local_govt_id,
                'store_id' => 0, 
                'phone' => $request->phone
            ]);
        }
        $user = $request->user();
        $customers = $user->customers()->with('lga');
        $list = view('partials.my-address-list', compact('customers'))->render();
        $data['address_list'] = $list;
        $data['data'] = $customers;

        return $this->sendResponse([], $message = "Address added succesfully");
    }

    public function myAddressList(Request $request) 
    {
        $user = $request->user();
        $customers = $user->customers()->with('lga');
        $list = view('partials.my-address-list', compact('customers'))->render();
        $data['view'] = $list;
        $data['data'] = $customers;

        return $this->sendResponse([], $message = "Address added succesfully");
    }

}