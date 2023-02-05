<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;

class StoreController extends BaseController
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => 'nullable|integer',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'nullable|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        $input['user_id'] = $request->user_id ?? $request->user()->id;
        $already_exist = Store::where('name', $request->name)->where('user_id', '<>', $input['user_id'])->first();
        if( $already_exist) {
            return $this->sendError('Store with the same name already exist, please edit the store name.', [], 400);  
        }

        $store = Store::updateOrCreate(
            [
                'name' => $request->name,
                'user_id' => $input['user_id']
            ],
            $input
        );

        return $this->sendResponse($store, 'Store created successfully.');
    }

    public function updateStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'warehoused' => 'nullable|boolean',
            'state_id' => 'nullable|integer',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $store = Store::find($request->id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }
        $store->update([
            'name' => $request->name ?? $store->name,
            'user_id' => $request->user_id ?? $store->user_id,
            'warehoused' => $request->warehoused ?? $store->warehoused,
            'state_id' => $request->state_id ?? $store->state_id,
            'lat' => $request->lat ?? $store->lat,
            'long' => $request->long ?? $store->long,
        ]);
        $store = Store::with('user')->find($request->id);

        return $this->sendResponse($store, 'Store edited successfully.');
    }

    public function listStores(){
        $stores = Store::all();
    
        return $this->sendResponse($stores, 'Stores retrieved successfully.');
    }

    public function viewStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $store = Store::with('user')->find($request->id);

        if(is_null($store)){
            return $this->sendError('Store not found', [], 404);
        }

        return $this->sendResponse($store, 'Store retrieved successfully.');
    }
}