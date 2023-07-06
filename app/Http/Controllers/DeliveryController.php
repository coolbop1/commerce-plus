<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\CartController;
use App\Models\CancelledDelivery;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\Product;
use App\Models\RouteTrail;
use App\Models\States;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('webrole:ROLE_ADMIN');
    }
    
    public function index()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        $pending_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->whereNull('delivery_boy_id')->where('status', 'in_transit')->orderBy('id', 'DESC')->get();
        // Delivery::where('status', 'pending')->get();

        return view('delivery-dashboard', compact('user', 'delivery_boy', 'pending_deliveries'));
    }

    public function asigned()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        //$assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', '<>', 'delivered')->get();
        $assigned_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->when(!$delivery_boy->is_operator, function($q) use($delivery_boy){
            return $q->where('delivery_boy_id', $delivery_boy->id);
        })->where('status', '<>', 'delivered')->orderBy('id', 'DESC')->get();

        return view('delivery-assigned', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function picked()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        //$assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', 'picked_up')->get();
        $assigned_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->when(!$delivery_boy->is_operator, function($q) use($delivery_boy){
            return $q->where('delivery_boy_id', $delivery_boy->id);
        })->where('status', 'awaiting_delivery')->orderBy('id', 'DESC')->get();
        return view('delivery-picked', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function onTheWay()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        //$assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', 'on_the_way')->get();
        $assigned_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->when(!$delivery_boy->is_operator, function($q) use($delivery_boy){
            return $q->where('delivery_boy_id', $delivery_boy->id);
        })->where('status', 'awaiting_delivery')->orderBy('id', 'DESC')->get();

        return view('delivery-ontheway', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function delivered()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        //$assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', 'delivered')->get();
        $assigned_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->when(!$delivery_boy->is_operator, function($q) use($delivery_boy){
            return $q->where('delivery_boy_id', $delivery_boy->id);
        })->where('status', 'delivered')->orderBy('id', 'DESC')->get();
        info($assigned_deliveries);

        return view('delivery-delivered', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function pending()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        $delivery_boys = DeliveryBoy::with('user')->where('hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            $q->where('station_id', $delivery_boy->station_id)->orWhereNull('station_id');
        })->where('is_operator', false)->get();
        //$assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->whereNull('delivery_boy_id')->where('status', 'pending')->get();
        // $assigned_deliveries = Delivery::with('delivery_boy.user')->whereHas('order.routeTrails', function($query) use($delivery_boy){
        //     return $delivery_boy->hub_id == $query->orderTrails->
        // })->whereNull('delivery_boy_id')->where('status', 'pending')->get();
        $assigned_deliveries = RouteTrail::whereHas('order')->where('origin_hub_id', $delivery_boy->hub_id)->where(function($q) use($delivery_boy){
            if($delivery_boy->station_id) {
                $q->whereNull('origin_station_id')->orWhere('origin_station_id', $delivery_boy->station_id);
            }
        })->whereNull('delivery_boy_id')->where('status', 'in_transit')->orderBy('id', 'DESC')->get();

        return view('delivery-pending', compact('user', 'delivery_boy', 'assigned_deliveries', 'delivery_boys'));
    }

    public function cancelRequest($delivery_id)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        $delivery = Delivery::where('delivery_boy_id', $delivery_boy->id)->where('id', $delivery_id)->first();
        if(is_null($delivery)) {
            return back();
        }
        $delivery->update(['status' => 'pending', 'delivery_boy_id' => null]);
        $delivery->order()->update(['status' => 'accepted']);
        CancelledDelivery::firstOrCreate([
            'delivery_id' => $delivery->id,
            'delivery_boy_id' => $delivery_boy->id
        ]);
        return back();
    }

    public function orderDetails($order_code)
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }
        $delivery_boy = DeliveryBoy::with('user')->where('user_id', $user->id)->first();
        $order = Order::with('checkout.customer', 'checkout.carts')->where('order_code', $order_code)->first();
        
        $user_id = optional(optional($order)->checkout)->user_id;
        $user_ = User::find($user_id);
        $request = new Request();
        $request->merge(['user' => $user_]);
        $carts_id = $order->checkout->carts->pluck('id')->toArray();

        $request->setUserResolver(function () use ($user_) {
            return $user_;
        });
       $user_carts = (new CartController())->getMyCart($request, null, $internal = true, $carts_id, $track = true);
       $track = $user_carts['track'] ?? [];
        return view('delivery-order-detail', compact('user', 'delivery_boy', 'order', 'track'));

    }

    public function cancelled()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }

        $delivery_boy = DeliveryBoy::with('user', 'cancelledDeliveries.delivery')->where('user_id', $user->id)->first();
        $assigned_deliveries = $delivery_boy->cancelledDeliveries;
         //Delivery::with('delivery_boy.user', 'order')->whereNull('delivery_boy_id')->where('status', 'pending')->get();

        return view('delivery-cancelled', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function collection()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }

        $delivery_boy = DeliveryBoy::with('user', 'cancelledDeliveries.delivery')->where('user_id', $user->id)->first();
        
        $assigned_deliveries = Delivery::whereHas('order.checkout', function($q) {
            return $q->where('order_type', 'cod'); 
        })->with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', 'delivered')->get();

        return view('delivery-collection', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function earnings()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }

        $delivery_boy = DeliveryBoy::with('user', 'cancelledDeliveries.delivery')->where('user_id', $user->id)->first();
        
        $assigned_deliveries = Delivery::with('delivery_boy.user', 'order')->where('delivery_boy_id', $delivery_boy->id)->where('status', 'delivered')->get();

        return view('delivery-earnings', compact('user', 'delivery_boy', 'assigned_deliveries'));
    }

    public function profile()
    {
        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
        }

        $delivery_boy = DeliveryBoy::with('user', 'cancelledDeliveries.delivery')->where('user_id', $user->id)->first();

        return view('delivery-profile', compact('user', 'delivery_boy'));
    }

}