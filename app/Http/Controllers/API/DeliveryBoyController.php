<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\DeliveryBoy;
use App\Models\Role;
use App\Models\TemporaryFiles;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DeliveryBoyController extends BaseController
{
    public function create(Request $request){
        $request->merge(['password' => 'password']);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'state_id' => 'nullable|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $user_input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        $user = User::create($user_input);

        if($request->image){
            $temp = TemporaryFiles::whereIn('id', explode(',', $request->image))->orWhereIn('file_path', explode(',', $request->image))->latest()->first();
            $request_thumbnail_img = $temp->file_path ?? null;
            if($request_thumbnail_img) {
                $request->request->add(['image' => $request_thumbnail_img]);
            }
        }
        if($user) {
            $delivery_boy = DeliveryBoy::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'state_id' => $request->state_id,
                'hub_id' => $request->hub_id ?? null,
                'image' => $request->image ?? null,
                'station_id' => $request->station_id ?? null,
                'is_operator' => $request->is_operator ?? 0
            ]);
            $role = Role::where('name', 'ROLE_DELIVERY')->first();
            $user->roles()->attach($role->id);
        }

        return $this->sendResponse($delivery_boy, 'Delivery Boy created successfully.');
    }

    public function update(Request $request)
    {
        $delivery_boy = DeliveryBoy::find($request->id);
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:delivery_boys,id',
            'phone' => 'nullable|unique:users,phone,'.$delivery_boy->user->id,
            'email' => 'nullable|email|unique:users,email,'.$delivery_boy->user->id,
            'state_id' => 'nullable|integer',
            'new_password"' => 'nullable',
            'c_password' => 'required_if:new_password,<>,null|same:new_password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $user_input = [];
        if($request->name) {
            $user_input['name'] = $request->name;
        }
        if($request->phone) {
            $user_input['phone'] = $request->phone;
        }
        if($request->email) {
            $user_input['email'] = $request->email;
        }
        if($request->new_password) {
            $user_input['password'] = bcrypt($request->new_password);
        }
        
        if(count($user_input) > 0) {
            $delivery_boy->user()->update($user_input);
        }
        $delivery_boy_input = [];
        if($request->phone) {
            $delivery_boy_input['phone'] = $request->phone;
        }
        if($request->address) {
            $delivery_boy_input['address'] = $request->address;
        }
        if($request->state_id) {
            $delivery_boy_input['state_id'] = $request->state_id;
        }
        if($request->hub_id) {
            $delivery_boy_input['hub_id'] = $request->hub_id;
        }
        if($request->station_id) {
            $delivery_boy_input['station_id'] = $request->station_id;
        }
        if($request->is_operator) {
            $delivery_boy_input['is_operator'] = $request->is_operator;
        }
        if($request->image) {
            if($request->image){
                $temp = TemporaryFiles::whereIn('id', explode(',', $request->image))->orWhereIn('file_path', explode(',', $request->image))->latest()->first();
                $request_thumbnail_img = $temp->file_path ?? null;
                if($request_thumbnail_img) {
                    $delivery_boy_input['image'] = $request_thumbnail_img;
                }
            }
        }
        $delivery_boy = DeliveryBoy::where('id', $request->id)->update($delivery_boy_input);

        return $this->sendResponse($delivery_boy, 'Delivery Boy updated successfully.');
    }

}