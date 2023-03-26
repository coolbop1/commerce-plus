<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\CategoryWebController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\SellerDashboardController;
use App\Http\Controllers\API\ShopWebController;
use App\Http\Controllers\DeliveryController;
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
Route::middleware(['session','webrole:ROLE_SUPERADMIN' ])->group( function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/delivery-boys', [AdminController::class, 'deliveryBoys']);
    Route::get('/admin/delivery-boys/create', [AdminController::class, 'deliveryBoyForm']);
    Route::get('/admin/delivery-boys/{delivery_boy_id}/edit', [AdminController::class, 'deliveryBoyForm']);
    Route::get('/admin/delivery-boy/ban/{delivery_boy_id}', [AdminController::class, 'deliveryBoys']);
    Route::get('/admin/delivery-boy/unban/{delivery_boy_id}', [AdminController::class, 'deliveryBoys']);
});

Route::middleware(['session','webrole:ROLE_DELIVERY', 'rider' ])->group( function () {
    Route::get('/delivery/dashboard', [DeliveryController::class, 'index']);
});


Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/categories', [CategoryWebController::class, 'index']);
Route::get('/shop/{shop_name}', [ShopWebController::class, 'index']);
Route::middleware(['session','webrole:ROLE_VENDOR' ])->group( function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index']);
    Route::get('/seller/shop', [SellerDashboardController::class, 'shop']);
    Route::get('/seller/products', [SellerDashboardController::class, 'products']);
    Route::get('/seller/digitalproducts', [SellerDashboardController::class, 'digitalProducts']);
    Route::get('/seller/product/create', [SellerDashboardController::class, 'productCreate']);
    Route::get('/seller/digitalproducts/create', [SellerDashboardController::class, 'digitalProductCreate']);
    Route::get('/seller/product/{product_id}/edit', [SellerDashboardController::class, 'productCreate']);
    Route::get('/seller/digitalproducts/{product_id}/edit', [SellerDashboardController::class, 'digitalProductCreate']);
    Route::get('/seller/product-bulk-upload/index', [SellerDashboardController::class, 'productBulkUpload']);
    Route::get('/seller/reviews', [SellerDashboardController::class, 'productsReviews']);
    Route::get('/seller/uploads', [SellerDashboardController::class, 'uploads']);
    Route::get('/seller/uploads/create', [SellerDashboardController::class, 'uploadFile']);
    Route::get('/seller/uploads/destroy/{id}', [SellerDashboardController::class, 'deleteFile']);
    Route::get('/seller/uploads/delete-multiple', [SellerDashboardController::class, 'deleteMultiple']);
    Route::get('/seller/seller-packages', [SellerDashboardController::class, 'packages']);
    Route::get('/seller/packages-payment-list', [SellerDashboardController::class, 'packagesList']);
    Route::get('/seller/pos', [SellerDashboardController::class, 'pos']);
    Route::get('/seller/orders', [SellerDashboardController::class, 'orders']);
    Route::get('/seller/invoice/{id}', [SellerDashboardController::class, 'downloadInvoice']);
    Route::get('/seller/orders/{code}', [SellerDashboardController::class, 'order']);
    Route::get('/seller/refund-request', [SellerDashboardController::class, 'refundRequest']);
    Route::get('/seller/payments', [SellerDashboardController::class, 'vendorPaymentHistory']);
    Route::get('/seller/money-withdraw-requests', [SellerDashboardController::class, 'moneyWithdrawRequest']);
});

