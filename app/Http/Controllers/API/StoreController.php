<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Store;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class StoreController extends BaseController
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'shop_name' => 'required',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'nullable|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $already_exist = Store::where('name', $request->shop_name)->first();
        if( $already_exist) {
            return $this->sendError('Store with the same name already exist, please edit the store name.', [], 400);  
        }

        $store = Store::updateOrCreate(
            [
                'name' => $request->shop_name,
            ],
            $input
        );
        if($store) {
            $user = User::find($request->user()->id);
            $user->stores()->attach($store->id);
        }


        return $this->sendResponse($store, 'Store created successfully.');
    }

    public function updateStore(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'nullable|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
            'shop_logo' => 'nullable|string',
            'shop_phone' => 'nullable|string',
            'shop_address' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string', 
            'banner' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'google' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $store = Store::find($id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }
        if($request->shop_logo){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->shop_logo))->orWhereIn('file_path', explode(',', $request->shop_logo))->latest()->first();
            $request_shop_logo = $temp->file_path ?? null;
        }
        if($request->banner){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->banner))->orWhereIn('file_path', explode(',', $request->banner))->pluck('file_path')->toArray();
            $request_shop_banner = count($temp) > 0 ? implode(',', $temp) : null;
        }
        $store->update([
            'name' => $request->name ?? $store->name,
            'user_id' => $request->user_id ?? $store->user_id,
            'warehoused' => $request->warehoused ?? $store->warehoused,
            'state_id' => $request->state_id ?? $store->state_id,
            'lat' => $request->lat ?? $store->lat,
            'long' => $request->long ?? $store->long,
            'shop_logo' => $request_shop_logo ?? $store->shop_logo,
            'shop_phone' => $request->shop_phone ?? $store->shop_phone,
            'shop_address' => $request->shop_address ?? $store->shop_address,
            'meta_title' => $request->meta_title ?? $store->meta_title,
            'meta_description' => $request->meta_description ?? $store->meta_description,
            'banner' => $request_shop_banner ?? $store->banner,
            'facebook' => $request->facebook ?? $store->facebook,
            'instagram' => $request->instagram ?? $store->instagram,
            'twitter' => $request->twitter ?? $store->twitter,
            'google' => $request->google ?? $store->google,
            'youtube' => $request->youtube ?? $store->youtube,
        ]);
        $store = Store::find($id);

        return $this->sendResponse($store, 'Store edited successfully.');
    }

    public function listStores(){
        $stores = Store::all();
    
        return $this->sendResponse($stores, 'Stores retrieved successfully.');
    }

    public function viewStore($id) {
        $store = Store::find($id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }

        return $this->sendResponse($store, 'Store retrieved successfully.');
    }
}