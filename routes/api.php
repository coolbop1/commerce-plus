<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
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
        
Route::middleware(['auth:sanctum', 'permission'])->group( function () {
    
    Route::get('switch-store', function (Request $request) {
        if($request->id) {
            session_start();
            $_SESSION['vendor_current_store_id'] = $request->id;
        }
        return $request->user();
    });
    Route::post('add-role', [RoleController::class, 'create']);
    //Category endpoints
    Route::middleware('role:ROLE_SUPERADMIN')->group( function () {
        Route::post('create-category', [CategoryController::class, 'create']);
        Route::post('edit-category', [CategoryController::class, 'updateCategory']);
        Route::get('delete-category', [CategoryController::class, 'deleteCategory']);
    });

    //Store endpoints
    Route::middleware('role:ROLE_VENDOR')->group( function () {
        Route::post('create-store', [StoreController::class, 'create']);
        Route::post('edit-store/{store_id}', [StoreController::class, 'updateStore']);
        Route::get('delete-store/{store_id}', [StoreController::class, 'deleteStore']);
    });

    //Cart Route
    Route::post('add-item-to-cart', [CartController::class, 'addItemToCart']);
    Route::get('remove-item-from-cart/{cart_id}', [CartController::class, 'removeItemFromCart']);
    Route::get('view-cart/{cart_user_id?}', [CartController::class, 'getMyCart']);

    //wish list
    Route::post('save-item', [ProductController::class, 'addItemToWishList']);
    Route::post('remove-saved-item', [ProductController::class, 'removeItemFromWishList']);
    Route::get('get-my-wish-list', [ProductController::class, 'getMyWishList']);
    Route::post('import-products', [SellerDashboardController::class, 'productImport']);
    Route::post('toggle-product-column', [SellerDashboardController::class, 'toggleProductColumn']);
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
});
Route::get('list-products', [ProductController::class, 'listProducts']);
Route::get('list-categories', [CategoryController::class, 'listCategories']);
Route::get('list-stores', [StoreController::class, 'listStores']);
Route::get('view-store/{store_id}', [StoreController::class, 'viewStore']);
Route::get('view-product/{product_id}', [ProductController::class, 'show']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    if(isset($_GET['session'])) {
        session_start();
        $_SESSION['logged_in'] = $request->user()->id;
    }
    return $request->user();
});
Route::get('/logout', function (Request $request) {
    session_start();
    session_destroy();
});
