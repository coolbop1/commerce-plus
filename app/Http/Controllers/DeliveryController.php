<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivery;
use App\Models\DeliveryBoy;
use App\Models\Product;
use App\Models\States;
use App\Models\Store;
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
        $pending_deliveries = Delivery::where('status', 'pending')->get();

        return view('delivery-dashboard', compact('user', 'delivery_boy', 'pending_deliveries'));
    }
}