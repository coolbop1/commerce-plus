<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\CategoryWebController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\SellerDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['checksession'])->group( function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::get('/register', function () {
        return view('register');
    });
});
Route::get('/testadmin', function () {
    return view('admin');
});

Route::get('/create-shop', function () {
    session_start();
    $show_user_form = !isset($_SESSION['logged_in']);
    return view('create-shop', compact('show_user_form'));
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/categories', [CategoryWebController::class, 'index']);
Route::middleware(['session'])->group( function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index']);
    Route::get('/seller/shop', [SellerDashboardController::class, 'shop']);
});

