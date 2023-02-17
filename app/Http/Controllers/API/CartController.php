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

class CartController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function removeItemFromCart(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        $input['user_id'] = $request->user()->id;
        return $this->getMyCart($request, $input['user_id']);
    }

    public function getMyCart(Request $request, $user_id = null)
    {
        $c_user_id = $user_id ?? $request->user()->id;

        $cart = Cart::with('product')->where('user_id', $c_user_id)->get();
        $items = CartResource::collection($cart);
        $data['items'] = $items;
        $data['total_price'] =  collect(json_decode(json_encode($items), true))->sum('price');
        return $this->sendResponse($data, 'Cart retrived successfully.');
    }

}