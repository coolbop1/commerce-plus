<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\ViwedProducts;
use Illuminate\Support\Facades\Validator;

class ProductController extends  BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'permission', 'role:ROLE_VENDOR'], ['only' => ['store','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::whereHas('store.user', function($q) use($request){
            $q->where('store.user.id', $request->user()->id);
        })->get();
    
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

    public function listProducts(Request $request)
    {
        $products = Product::with('store')->when($request->store_id, function($query) use($request){
            $query->where('store_id', $request->store_id);
        })->get();
    
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
            'store_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'nullable|integer'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $product = Product::updateOrCreate(
            [
                'name' => $input['name'],
                'store_id' => $input['store_id'],
                'category_id' => $input['category_id']
            ],
            $input
        );
   
        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
  
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        $user = $request->user();
        if(!is_null($user)) {
            ViwedProducts::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $product->id
                ]
                );
        }
   
        return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();
   
        $validator = Validator ::make($input, [
            'name' => 'nullable|string',
            'detail' => 'nullable|string',
            'store_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'price' => 'nullable|numeric'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $product->name = $request->name ?? $product->name;
        $product->detail = $request->detail ?? $product->detail;
        $product->store_id = $request->store_id ?? $product->store_id;
        $product->category_id = $request->category_id ?? $product->category_id;
        $product->quantity = $request->quantity ?? $product->quantity;
        $product->price = $request->price ?? $product->price;
        $product->save();
   
        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
   
        return $this->sendResponse([], 'Product deleted successfully.');
    }

    public function addItemToWishList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        //$request->user()->wishList()->sync(['product_id' => $request->product_id]);
        $request->user()->wishList()->detach($request->product_id);
        $request->user()->wishList()->attach($request->product_id);

        return $this->getMyWishList($request);
        //return $this->sendResponse([], 'Product added to wish list successfully.');
    }

    public function removeItemFromWishList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $request->user()->wishList()->detach($request->product_id);

        return $this->sendResponse([], 'Product removed from wish list successfully.');
    }

    public function getMyWishList(Request $request)
    {
        $wishlist = $request->user()->wishList()->get();
        
        return $this->sendResponse(ProductResource::collection($wishlist), 'Wish list retrived successfully.');
    }
}