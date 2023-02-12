<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\StoreController;
use App\Models\Category;
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
    Route::post('login', 'login');
});
        
Route::middleware(['auth:sanctum', 'permission'])->group( function () {
    Route::middleware('role:ROLE_VENDOR')->group( function () {
        Route::resource('products', ProductController::class);
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
    Route::get('view-cart/{cart_user_id}', [CartController::class, 'getMyCart']);
});
Route::get('list-products', [ProductController::class, 'listProducts']);
Route::get('list-categories', [CategoryController::class, 'listCategories']);
Route::get('list-stores', [StoreController::class, 'listStores']);
Route::get('view-store/{store_id}', [StoreController::class, 'viewStore']);
Route::get('view-product/{product_id}', [ProductController::class, 'show']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
