<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Hub;
use App\Models\HubConnect;
use App\Models\LocalGovt;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoleController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        //$input = $request->all();
        $role = Role::updateOrCreate(
            ['name' => $request->name],
            ['description' => $request->description]
        );
        $success['data'] =  $role;
        return $this->sendResponse($success, 'Role created successfully.');
    }

    public function createHub(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $input = $request->all();
        $hub = Hub::create($input);
        if($request->local_govts) {
            $hub_id = $hub->id;
            LocalGovt::where('hub_id', $hub_id)->update(['hub_id' => null]);
            $local_govt_array = explode(',', $request->local_govts);
            LocalGovt::whereIn('name', $local_govt_array)->update(['hub_id' => $hub_id]);
        }
        $success['data'] =  $hub;
        return $this->sendResponse($success, 'Hub created successfully.');
    }

    public function updateHub(Request $request){

        $validator = Validator::make($request->all(), [
            'hub_id' => 'required',
            'name' => 'required',
            'address' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        $hub = Hub::updateOrCreate(
            ['id' => $request->hub_id],
            $input
        );
        if($request->local_govts) {
            $hub_id = $hub->id;
            LocalGovt::where('hub_id', $hub_id)->update(['hub_id' => null]);
            $local_govt_array = explode(',', $request->local_govts);
            LocalGovt::whereIn('name', $local_govt_array)->update(['hub_id' => $hub_id]);
        }

        $success['data'] =  $hub;
        return $this->sendResponse($success, 'Hub created successfully.');
    }

    public function saveConnectRate(Request $request){

        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'rate' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $data_ = [];
        $data_['rate'] = $request->rate;
        $column = $request->column ?? 'rate';
        $data_[$column] = $request->rate;
        $data = HubConnect::updateOrCreate(
            [
                "from" => $request->from,
                "to" => $request->to
            ],
            $data_
            );
        if($request->double){
            HubConnect::updateOrCreate(
                [
                    "from" => $request->to,
                    "to" => $request->from
                ],
                $data_
                );
        }
        return $this->sendResponse([], 'Hub connect saved successfully.');
    }


}