<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DeliveryBoyController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SellerDashboardController;
use App\Http\Controllers\API\StoreController;
use App\Models\Category;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('create-shop', 'createShop');
    Route::post('login', 'login');
});
Route::post('/ajax-search', [HomeController::class, 'search']);

Route::post('user-customer', [RegisterController::class, 'register']);
        
Route::middleware(['auth:sanctum', 'permission'])->group( function () {
    Route::post('user-customer-auth', [RegisterController::class, 'register']);
    Route::post('validate-cart', [StoreController::class, 'validateCart']);
    Route::post('submit-order', [StoreController::class, 'submitOrder']);
    Route::post('recharge-wallet', [StoreController::class, 'rechargeWallet']);
    Route::post('update_user', [RegisterController::class, 'updateUser']);
    
    
    Route::get('switch-store', function (Request $request) {
        if($request->id) {
            //session_start();
            if($request->id == '') {
               unset($_SESSION['vendor_current_store_id']);
            } else {
                $_SESSION['vendor_current_store_id'] = $request->id;
            }
            
        } else {
            unset($_SESSION['vendor_current_store_id']);
        }
        return $request->user();
    });
    Route::post('add-role', [RoleController::class, 'create']);
    //Category endpoints
    Route::middleware('role:ROLE_SUPERADMIN')->group( function () {
        Route::post('create-category', [CategoryController::class, 'create']);
        Route::post('create-brand', [CategoryController::class, 'createBrand']);
        Route::post('edit-category', [CategoryController::class, 'updateCategory']);
        Route::get('delete-category', [CategoryController::class, 'deleteCategory']);
        Route::post('create-delivery-boy', [DeliveryBoyController::class, 'create']);
        Route::post('update-delivery-boy', [DeliveryBoyController::class, 'update']);
        Route::post('list-all-orders', [AdminController::class, 'listOrders']);
    });

    //Store endpoints
    Route::middleware('role:ROLE_VENDOR')->group( function () {
        Route::post('create-store', [StoreController::class, 'create']);
        Route::post('edit-store/{store_id}', [StoreController::class, 'updateStore']);
        Route::get('delete-store/{store_id}', [StoreController::class, 'deleteStore']);
        Route::post('import-products', [SellerDashboardController::class, 'productImport']);
        Route::get('export-products', [SellerDashboardController::class, 'productExport']);
        Route::post('toggle-product-column', [SellerDashboardController::class, 'toggleProductColumn']);
        Route::post('create-customer', [StoreController::class, 'createCustomer']);
        Route::post('pos-order', [StoreController::class, 'posOrder']);
        Route::post('toggle-refund-request-approval', [StoreController::class, 'toggleRefundApproval']);
        Route::post('store-withdrawal-request/{store_id}', [StoreController::class, 'withdrawalRequest']);
    });
    Route::middleware('roles:ROLE_VENDOR|ROLE_DELIVERY')->group( function () {
        Route::put('update-order-status/{order_id}', [StoreController::class, 'updateOrderStatus']);
    });

    Route::middleware('role:ROLE_DELIVERY')->group( function () {
        Route::put('update-delivery-status/{id}', [StoreController::class, 'updateDeliveryStatus']);
        Route::post('update-delivery-profile', [DeliveryBoyController::class, 'update']);
    });

    //Cart Route
    Route::post('add-item-to-cart', [CartController::class, 'addItemToCart']);
    Route::get('remove-item-from-cart/{cart_id}', [CartController::class, 'removeItemFromCart']);
    Route::get('view-cart/{cart_user_id?}', [CartController::class, 'getMyCart']);

    //wish list
    Route::post('save-item', [ProductController::class, 'addItemToWishList']);
    Route::post('remove-saved-item', [ProductController::class, 'removeItemFromWishList']);
    Route::get('get-my-wish-list', [ProductController::class, 'getMyWishList']);
    Route::resource('products', ProductController::class);
    Route::post('/file-upload', function (Request $request) {
        $file = $request->file('file');
    
        $fileName = time().'.'.$file->extension();
        $destinationPath = 'uploads';
        // $fileinfo = getimagesize($file);
        // $width = $fileinfo[0];
        // $height = $fileinfo[1];
    
        $file->move($destinationPath,$fileName);
        $temp_file = TemporaryFiles::create([
            'user_id' => $request->user()->id,
            'file_path' => $destinationPath.'/'.$fileName
        ]);
    
        return response()->json(['message' => 'File saved', 'data' => $temp_file, 'file_path' => $destinationPath.'/'.$fileName], 200);
    });
    Route::post('subscribe', [StoreController::class, 'subscribe']);
    
});
Route::get('list-products', [ProductController::class, 'listProducts']);
Route::get('list-categories', [CategoryController::class, 'listCategories']);
Route::get('list-stores', [StoreController::class, 'listStores']);
Route::get('view-store/{store_id}', [StoreController::class, 'viewStore']);
Route::get('view-product/{product_id}', [ProductController::class, 'show']);
Route::post('list_category_products', [CategoryController::class, 'listCategoryProduct']);
Route::post('list_brand_products', [CategoryController::class, 'listBrandProduct']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    if(isset($_GET['session'])) {
        session_start();
        $_SESSION['logged_in'] = $request->user()->id;
    }
    return $request->user();
});
Route::get('/logout', function (Request $request) {
    //session_start();
    session_destroy();
});
