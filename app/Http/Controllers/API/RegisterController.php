<?php
   
namespace App\Http\Controllers\API;
//session_start();
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use App\Notifications\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, $session_id = null)
    {
        info("request->all() ",$request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($request->has('address') && $request->state_id == ''){
            return $this->sendError('Please pick a Town', [], 400);       
        }
        if($request->user() && $request->has('customer_id') && $request->has('address') && !empty($request->customer_id)) { 
            $request->user()->customer()->where('id', $request->customer_id)->update([
                    'address' => $request->address, 
                    'state_id' => $request->state_id,
                    'local_govt_id' => $request->local_govt_id,
                    'phone' => $request->phone
                ]);
            return $this->sendResponse([], $message = "Address Updated succesfully");
        }
        if($request->user() && empty($request->customer_id) && $request->has('address') && !empty($request->address)) { 
            $customer = Customer::create([
                'user_id' => $request->user()->id,
                'address' => $request->address, 
                'state_id' => $request->state_id,
                'local_govt_id' => $request->local_govt_id,
                'store_id' => 0, 
                'phone' => $request->phone
            ]);
            if($session_id) {
                Cart::where('session', $session_id)->whereNull('checkout_id')->update(['user_id' => $request->user()->id,'customer_id' => $customer->id]);
            }
            return $this->sendResponse([], $message = "Address added succesfully");
        }
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
   
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->notify(new Verification());
        if($request->has('account_type')) {
            $new_user = User::find($user->id);
            switch ($request->account_type) {
                case 'vendor':
                    $role = Role::where('name', 'ROLE_VENDOR')->first();
                    $new_user->roles()->attach($role->id);
                    break;
                case 'delivery':
                    $role = Role::where('name', 'ROLE_DELIVERY')->first();
                    $new_user->roles()->attach($role->id);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        if($request->has('address')) {
            
            $customer = Customer::create([
                'customer_name' => $request->name, 
                'user_id' => $user->id, 
                'address' => $request->address, 
                'state_id' => $request->state_id, 
                'local_govt_id' => $request->local_govt_id,
                'store_id' => 0, 
                'phone' => $request->phone
            ]);
            if($session_id) {
                Cart::where('session', $session_id)->whereNull('checkout_id')->update(['user_id' => $user->id,'customer_id' => $customer->id]);
            }
            return $this->login($request, $message = "New customer account created succesfully");
            
        }
        //$success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        //$_SESSION['logged_in'] = User::with(['roles', 'carts'])->find($user->id);
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'new_password' => 'nullable',
            'confirm_password' => 'same:new_password'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $user = User::find($request->user()->id);
        if($request->new_password) {
            $user->password = bcrypt($request->password);
        }
        if($request->name){
            $user->name = $request->name;
        }
        if($request->phone){
            $user->phone = $request->phone;
        }
        $user->save();
        
        return $this->sendResponse($user, 'User updated successfully.');
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
    public function login(Request $request, $message = null)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        
        if($request->user_id) {
            $user = User::find($request->user_id);
            
            if(optional($user)->email == $request->email && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user->email_verified_at = now();
                $user->save();
                $user->refresh();
                $message = "Account Verified successfully";
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 401);
            }
        }
        if((Auth::attempt(['email' => $request->email, 'password' => $request->password]) && (Carbon::parse(Auth::user()->created_at)->lte('2023-04-27') || Auth::user()->email_verified_at)) || (Auth::attempt(['email' => $request->email, 'password' => $request->password]) && $request->has('address'))){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            $_SESSION['logged_in'] = User::with(['roles', 'carts'])->find($user->id);
            return $this->sendResponse($success, $message ?? 'User login successfully.');
        } elseif (Auth::user() && is_null(Auth::user()->email_verified_at)) {
            $user = User::find(Auth::user()->id); 
            $user->notify(new Verification());
            return $this->sendError('Please verify your account, Verification link as been sent to your mail.',[], 400);
        } else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 401);
        } 
    }
}