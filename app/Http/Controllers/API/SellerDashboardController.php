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
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SellerDashboardController extends BaseController
{
    public function index()
    {

        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
            info("user__ ".json_encode($user));
        }
        if(isset($_SESSION['vendor_current_store_id'])) {
            $store_id = $_SESSION['vendor_current_store_id'];
        } else {
            $store_id = $user->stores->first()->value('id');
        }
        $store = Store::with('products')->find($store_id);


        return view('vendor-dasboard', compact('user', 'store'));
    }
}