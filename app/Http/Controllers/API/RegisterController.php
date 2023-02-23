<?php
   
namespace App\Http\Controllers\API;
session_start();
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
   
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if($request->has('account_type')) {
            $new_user = User::find($user->id);
            switch ($request->account_type) {
                case 'vendor':
                    $role = Role::where('name', 'ROLE_VENDOR')->first();
                    $new_user->roles()->sync(['role_id' => $role->id]);
                    break;
                case 'delivery':
                    $role = Role::where('name', 'ROLE_DELIVERY')->first();
                    $new_user->roles()->sync(['role_id' => $role->id]);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        $_SESSION['logged_in'] = User::with(['roles', 'carts'])->find($user->id);
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function createShop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'shop_name' => 'required',
            'address' => 'nullable'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $already_exist = Store::where('name', $request->name)->first();
        if( $already_exist) {
            return $this->sendError('Store with the same name already exist, please edit the store name.', [], 400);  
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $role = Role::where('name', 'ROLE_VENDOR')->first();
        $user->roles()->sync(['role_id' => $role->id]);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $request->shop_name;


        $store = Store::updateOrCreate(
            [
                'name' => $request->shop_name,
            ]
        );
        if($store) {
            $user->stores()->attach($store->id);
            return $this->sendResponse($success, 'Shop created successfully.');
        }
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            $_SESSION['logged_in'] = User::with(['roles', 'carts'])->find($user->id);
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 401);
        } 
    }
}