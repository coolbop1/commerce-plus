<?php
   
namespace App\Http\Controllers\API;
   
//session_start();
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\Order;
use App\Models\PickupStation;
use App\Models\Product;
use App\Models\RechargeHistory;
use App\Models\RefundRequest;
use App\Models\States;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends BaseController
{
    public function wishList()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        return view('wish-list', compact('user'));

    }

    public function dashboard()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $last_credit_transaction = $user ? RechargeHistory::where('user_id', $user->id)->where('transaction', 'credit')->latest()->first() : null;
        $customer = optional(optional($user)->customer)->last();
        return view('dashboard', compact('user', 'last_credit_transaction', 'customer'));
    }

    public function purchaseHistory()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $checkout_id = Checkout::where('user_id', $user->id)->pluck('id')->toArray();
        $orders = Order::whereIn('checkout_id', $checkout_id)->get();
        return view('purchase-history', compact('user', 'orders'));
    }

    public function digitalPurchaseHistory()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $checkout_id = Checkout::where('user_id', $user->id)->where('status', 'completed')->pluck('id')->toArray();
        $carts = Cart::whereHas('product', function($q){
            $q->where('is_digital', 1);
        })->whereIn('checkout_id', $checkout_id)->get();
        return view('digital-purchase-history', compact('user', 'carts'));
    }

    public function sentRefundRequest()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $checkout_id = Checkout::where('user_id', $user->id)->where('status', 'completed')->pluck('id')->toArray();
        $carts_id = Cart::whereIn('checkout_id', $checkout_id)->pluck('id')->toArray();
        $refundRequests = RefundRequest::whereIn('cart_id', $carts_id)->get();
        return view('refund-request', compact('user', 'refundRequests'));
    }

    public function wallet()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $recharge_histories = RechargeHistory::where('transaction', 'credit')->where('user_id', $user->id)->get();
        return view('wallet', compact('user', 'recharge_histories'));
    }

    public function profile()
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::with('customers')->find($_SESSION['logged_in']->id);
        }
        return view('profile', compact('user'));
    }

    public function orderDetail($order_code)
    {
        $user = null;
        if(isset($_SESSION['logged_in'])) {
            $user = User::find($_SESSION['logged_in']->id);
        }
        $order = Order::where('order_code', $order_code)->first();
        return view('buyer-order-detail', compact('user', 'order'));

    }

}