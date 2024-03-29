<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\TemporaryFiles;
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
            'sub_category_id' => 'nullable|integer',
            'section_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'unit' => 'nullable|string',
            'min_qty' => 'nullable|integer',
            'refundable' => 'nullable|boolean',
            'photos' => 'nullable|string',
            'thumbnail_img' => 'nullable|string',
            'video_provider' => 'nullable|in:youtube',
            'video_link ' => 'nullable|string',
            'price' => 'required|numeric|gt:0',
            'discount' => 'nullable|integer',
            'discount_type' => 'nullable|in:amount,percent',
            'sku' => 'nullable|string', 
            'external_link' => 'nullable|string', 
            'external_link_btn' => 'nullable|string',
            'files' => 'nullable|string', 
            'pdf' => 'nullable|string', 
            'meta_title' => 'nullable|string', 
            'meta_description' =>'nullable|string', 
            'meta_img' => 'nullable|string', 
            'shipping_type' => 'nullable|in:free,flat_rate',
            'low_stock_quantity' => 'nullable|integer',
            'stock_visibility_state' => 'nullable|in:quantity,text,hide',
            'cash_on_delivery' => 'nullable|boolean',
            'est_shipping_days' => 'nullable|integer',
            'tax' => 'nullable|integer',
            'tax_type' => 'nullable|in:amount,percent',
            'vat' => 'nullable|integer',
            'vat_type' => 'nullable|in:amount,percent',
            'user_id' => 'nullable|integer',
            'is_digital' => 'nullable|boolean',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        if(!$request->user()->isStoreAdmin($request->store_id)){
            return $this->sendError('Permission denied.', [], 401);
        }
        if($request->thumbnail_img){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->thumbnail_img))->orWhereIn('file_path', explode(',', $request->thumbnail_img))->latest()->first();
            $request_thumbnail_img = $temp->file_path ?? null;
            if($request_thumbnail_img) {
                $request->request->add(['thumbnail_img' => $request_thumbnail_img]);
            }
        }
        if($request->photos){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->photos))->orWhereIn('file_path', explode(',', $request->photos))->pluck('file_path')->toArray();
            $request_photos = count($temp) > 0 ? implode(',', $temp) : null;
            if($request_photos) {
                $request->request->add(['photos' => $request_photos]);
            }
        }

        $category_string = $request->category_id;
        $category_array = !is_null($category_string) && $category_string != '' ? explode('_', $category_string) : [];
        $request->request->add(['user_id' => $request->user()->id]);
        switch (true) {
            case count($category_array) == 1:
                $request->request->add(['category_id' => $category_array[0]]);
                break;
            case count($category_array) == 2:
                $request->request->add(['category_id' => $category_array[0]]);
                $request->request->add(['sub_category_id' => $category_array[1]]);
                break;
            case count($category_array) == 3:
                $request->request->add(['category_id' => $category_array[0]]);
                $request->request->add(['sub_category_id' => $category_array[1]]);
                $request->request->add(['section_id' => $category_array[2]]);
                break;
            default:
                # code...
                break;
        }
        $input = $request->all();
   
        $product = Product::updateOrCreate(
            [
                'name' => $input['name'],
                'store_id' => $input['store_id'],
                'category_id' => $input['category_id'],
                'sub_category_id' => $input['sub_category_id'] ?? null,
                'section_id' => $input['section_id'] ?? null,
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
            'category_id' => 'nullable',
            'quantity' => 'nullable|integer',
            'sub_category_id' => 'nullable',
            'section_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'unit' => 'nullable|string',
            'min_qty' => 'nullable|integer',
            'refundable' => 'nullable|boolean',
            'photos' => 'nullable|string',
            'thumbnail_img' => 'nullable|string',
            'video_provider' => 'nullable|in:youtube',
            'video_link ' => 'nullable|string',
            'price' => 'required|numeric|gt:0',
            'discount' => 'nullable|integer',
            'discount_type' => 'nullable|in:amount,percent',
            'sku' => 'nullable|string', 
            'external_link' => 'nullable|string', 
            'external_link_btn' => 'nullable|string',
            'files' => 'nullable|string', 
            'pdf' => 'nullable|string', 
            'meta_title' => 'nullable|string', 
            'meta_description' =>'nullable|string', 
            'meta_img' => 'nullable|string', 
            'shipping_type' => 'nullable|in:free,flat_rate',
            'low_stock_quantity' => 'nullable|integer',
            'stock_visibility_state' => 'nullable|in:quantity,text,hide',
            'cash_on_delivery' => 'nullable|boolean',
            'est_shipping_days' => 'nullable|integer',
            'tax' => 'nullable|integer',
            'tax_type' => 'nullable|in:amount,percent',
            'vat' => 'nullable|integer',
            'vat_type' => 'nullable|in:amount,percent',
            'user_id' => 'nullable|integer',
            'is_digital' => 'nullable|boolean'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if($request->thumbnail_img){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->thumbnail_img))->orWhereIn('file_path', explode(',', $request->thumbnail_img))->latest()->first();
            $request_thumbnail_img = $temp->file_path ?? null;
            if($request_thumbnail_img) {
                $request->request->add(['thumbnail_img' => $request_thumbnail_img]);
            }
        }
        if($request->photos){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->photos))->orWhereIn('file_path', explode(',', $request->photos))->pluck('file_path')->toArray();
            $request_photos = count($temp) > 0 ? implode(',', $temp) : null;
            if($request_photos) {
                $request->request->add(['photos' => $request_photos]);
            }
        }

        $category_string = $request->category_id;
        $category_array = !is_null($category_string) && $category_string != '' ? explode('_', $category_string) : [];
        $request->request->add(['user_id' => $request->user()->id]);
        switch (true) {
            case count($category_array) == 1:
                $request->request->add(['category_id' => $category_array[0]]);
                break;
            case count($category_array) == 2:
                $request->request->add(['category_id' => $category_array[0]]);
                $request->request->add(['sub_category_id' => $category_array[1]]);
                break;
            case count($category_array) == 3:
                $request->request->add(['category_id' => $category_array[0]]);
                $request->request->add(['sub_category_id' => $category_array[1]]);
                $request->request->add(['section_id' => $category_array[2]]);
                break;
            default:
                # code...
                break;
        }
   
        // $product->name = $request->name ?? $product->name;
        // $product->detail = $request->detail ?? $product->detail;
        // $product->store_id = $request->store_id ?? $product->store_id;
        // $product->category_id = $request->category_id ?? $product->category_id;
        // $product->quantity = $request->quantity ?? $product->quantity;
        // $product->price = $request->price ?? $product->price;
        // $product->brand_id = $request->brand_id ?? $product->brand_id;
        // $product->unit = $request->unit ?? $product->unit;
        $request_all = $request->all();
        $product_columns = array_keys($product->toArray());
        foreach ($request_all as $key => $new_val) {
            if(in_array($key, $product_columns))
            $product->{$key} = $new_val;
        }
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
        if($request->user()->wishList()->find($request->product_id)) {
            $request->user()->wishList()->detach($request->product_id);
        } else {
            $request->user()->wishList()->attach($request->product_id);
        }
        
        

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