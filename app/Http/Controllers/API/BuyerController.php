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

}