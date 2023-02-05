<?php

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
        
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
    Route::post('add-role', [RoleController::class, 'create']);
    //Category endpoints
    Route::middleware('role:ROLE_SUPERADMIN')->group( function () {
        Route::post('create-category', [CategoryController::class, 'create']);
        Route::post('edit-category', [CategoryController::class, 'updateCategory']);
        Route::get('delete-category', [CategoryController::class, 'deleteCategory']);
    });

    //Category endpoints
    Route::middleware('role:ROLE_ADMIN')->group( function () {
        Route::post('create-store', [StoreController::class, 'create']);
        Route::post('edit-store', [StoreController::class, 'updateStore']);
        Route::get('delete-store', [StoreController::class, 'deleteStore']);
    });

});
Route::get('list-categories', [CategoryController::class, 'listCategories']);
Route::get('list-stores', [StoreController::class, 'listStores']);
Route::get('view-store', [StoreController::class, 'viewStore']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
