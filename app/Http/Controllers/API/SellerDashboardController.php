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
        }

        return view('vendor-dasboard', compact('user'));
    }
}