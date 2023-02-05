<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\RoleController;
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
    //Ctegory endpoints
    Route::middleware('role:ROLE_SUPERADMIN')->group( function () {
        Route::post('create-category', [CategoryController::class, 'create']);
        Route::post('edit-category', [CategoryController::class, 'updateCategory']);
        Route::get('delete-category', [CategoryController::class, 'deleteCategory']);
    });
    Route::get('list-categories', [CategoryController::class, 'listCategories']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
