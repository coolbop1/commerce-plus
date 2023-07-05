<?php
session_start();
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\BuyerController;
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
Route::get('/product/{product_name}', [HomeController::class, 'product']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/checkout/delivery_info', [HomeController::class, 'checkoutDeliveryInfo']);
Route::get('/checkout/payment_select', [HomeController::class, 'checkoutPaymentSelect']);
Route::get('/checkout/order-confirmed', [HomeController::class, 'checkoutOrderConfirmed']);
Route::get('/flash-deals', [HomeController::class, 'flashDeal']);
Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/return-policy', [HomeController::class, 'returnPolicy']);
Route::get('/support-policy', [HomeController::class, 'supportPolicy']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/sellers', [HomeController::class, 'stores']);
Route::get('/category/{caterogy_slug}', [HomeController::class, 'category']);
Route::get('/brands', [HomeController::class, 'brands']);
Route::get('/brand/{brand_slug}', [HomeController::class, 'brand']);
Route::get('/search', [HomeController::class, 'searchpage']);

Route::middleware(['session'])->group( function () {
    Route::get('/wishlists', [BuyerController::class, 'wishList']);
    Route::get('/dashboard', [BuyerController::class, 'dashboard']);
    Route::get('/purchase_history', [BuyerController::class, 'purchaseHistory']);
    Route::get('/invoice/{id}', [SellerDashboardController::class, 'downloadInvoice']);
    Route::get('/purchase_history/details/{order_code}', [BuyerController::class, 'orderDetail']);
    Route::get('/digital-purchase-history', [BuyerController::class, 'digitalPurchaseHistory']);
    Route::get('/sent-refund-request', [BuyerController::class, 'sentRefundRequest']);
    Route::get('/wallet', [BuyerController::class, 'wallet']);
    Route::get('/profile', [BuyerController::class, 'profile']);
});


Route::middleware(['checksession'])->group( function () {
    Route::get('/login', function () {
        $user_id = null;
        return view('login', compact('user_id'));
    })->name('login');
    Route::get('/verify-account/{user_id}', function ($user_id) {
        $user_id = explode('$rpm', str_replace('k0k0k', '/', $user_id));
        if(isset($user_id[1]) && is_numeric($user_id[1]) && isset($user_id[2]) && password_verify($user_id[1], $user_id[0].$user_id[2])) {
            $user_id = $user_id[1];
            return view('login', compact('user_id'));
        }
        return redirect('/');
    })->name('verify');
    Route::get('/register', function () {
        return view('register');
    });
});
Route::get('/testadmin', function () {
    return view('admin');
});

Route::get('/create-shop', function () {
    //session_start();
    $show_user_form = !isset($_SESSION['logged_in']);
    return view('create-shop', compact('show_user_form'));
});
Route::middleware(['session','webrole:ROLE_SUPERADMIN' ])->group( function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/delivery-boys', [AdminController::class, 'deliveryBoys']);
    Route::get('/admin/delivery-boys/create', [AdminController::class, 'deliveryBoyForm']);
    Route::get('/admin/delivery-boys/{delivery_boy_id}/edit', [AdminController::class, 'deliveryBoyForm']);
    Route::get('/admin/delivery-boy/ban/{delivery_boy_id}', [AdminController::class, 'deliveryBoys']);
    Route::get('/admin/approve-store/{store_id}', [AdminController::class, 'approveStore']);
    Route::get('/admin/delivery-boy/unban/{delivery_boy_id}', [AdminController::class, 'deliveryBoys']);
    Route::get('/admin/pos', [AdminController::class, 'pos']);
    Route::get('/admin/products/all', [AdminController::class, 'products']);
    Route::get('/admin/products/create', [AdminController::class, 'createProduct']);
    Route::get('/admin/product/{product_id}/edit', [AdminController::class, 'createProduct']);
    Route::get('/admin/products/admin', [AdminController::class, 'inHouseProducts']);
    Route::get('/admin/products/seller', [AdminController::class, 'sellerProducts']);
    Route::get('/admin/digitalproducts', [AdminController::class, 'digitalProducts']);
    Route::get('/admin/product-bulk-upload/index', [AdminController::class, 'productBulkUpload']);
    Route::get('/admin/product-bulk-export/{store_id}', [SellerDashboardController::class, 'productExport']);
    Route::get('/admin/product-bulk-export', [SellerDashboardController::class, 'productExport']);
    Route::get('/admin/categories', [AdminController::class, 'categories']);
    Route::get('/admin/categories/create', [AdminController::class, 'addCategories']);
    Route::get('/admin/categories/edit/{category_id}', [AdminController::class, 'addCategories']);
    Route::get('/admin/categories/destroy/{category_id}', [AdminController::class, 'deleteCategory']);
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('brands');
    Route::get('/admin/brands/edit/{brand_id}', [AdminController::class, 'brandEdit']);
    Route::get('/admin/brands/destroy/{brand_id}', [AdminController::class, 'brandDelete']);
    Route::get('/reviews', [AdminController::class, 'reviews']);
    Route::get('/admin/all_orders', [AdminController::class, 'orders']);
    Route::get('/admin/orders/{code}', [AdminController::class, 'order']);
    Route::get('/admin/inhouse-orders', [AdminController::class, 'inhouseOrders']);
    Route::get('/admin/seller_orders', [AdminController::class, 'sellerOrders']);
    Route::get('/admin/hub', [AdminController::class, 'hub']);
    Route::get('/admin/hub/create', [AdminController::class, 'hubCreate']);
    Route::get('/admin/hubs/edit/{id}', [AdminController::class, 'hubEdit']);
    Route::get('/admin/hubs/destroy/{id}', [AdminController::class, 'hubDelete']);
    Route::get('/admin/towns', [AdminController::class, 'town']);


    Route::get('/admin/station', [AdminController::class, 'station']);
    Route::get('/admin/station/create', [AdminController::class, 'stationCreate']);
    Route::get('/admin/station/edit/{id}', [AdminController::class, 'stationEdit']);
    Route::get('/admin/station/destroy/{id}', [AdminController::class, 'hubDelete']);
    Route::get('/admin/onforwarding', [AdminController::class, 'onForwarding']);
});

Route::middleware(['session','webrole:ROLE_DELIVERY', 'rider' ])->group( function () {
    Route::get('/delivery/dashboard', [DeliveryController::class, 'index']);
    Route::get('/delivery/assigned-deliveries', [DeliveryController::class, 'asigned']);
    Route::get('/delivery/pickup-deliveries', [DeliveryController::class, 'picked']);
    Route::get('/delivery/on-the-way-deliveries', [DeliveryController::class, 'onTheWay']);
    Route::get('/delivery/cancel-request/{delivery_id}', [DeliveryController::class, 'cancelRequest']);
    Route::get('/delivery/invoice/{id}', [SellerDashboardController::class, 'downloadInvoice']);
    Route::get('/delivery/order-detail/{order_code}', [DeliveryController::class, 'orderDetails']);
    Route::get('/delivery-boy/order-detail/{order_code}', [DeliveryController::class, 'orderDetails']);
    Route::get('/delivery/completed-deliveries', [DeliveryController::class, 'delivered']);
    Route::get('/delivery/pending-deliveries', [DeliveryController::class, 'pending']);
    Route::get('/delivery/cancelled-deliveries', [DeliveryController::class, 'cancelled']);
    Route::get('/delivery/total-collections', [DeliveryController::class, 'collection']);
    Route::get('/delivery/total-earnings', [DeliveryController::class, 'earnings']);
    Route::get('/delivery/profile', [DeliveryController::class, 'profile']);
});


Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/categories', [CategoryWebController::class, 'index']);
Route::get('/shop/{shop_name}', [ShopWebController::class, 'index']);
Route::middleware(['session','webrole:ROLE_VENDOR' ])->group( function () {
    Route::middleware(['checkapproval' ])->group( function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index']);
    Route::get('/seller/shop', [SellerDashboardController::class, 'shop']);
    Route::get('/seller/products', [SellerDashboardController::class, 'products']);
    Route::get('/seller/digitalproducts', [SellerDashboardController::class, 'digitalProducts']);
    Route::get('/seller/product/create', [SellerDashboardController::class, 'productCreate']);
    Route::get('/products/destroy/{product_id}', [SellerDashboardController::class, 'productDelete']);
    Route::get('/seller/digitalproducts/create', [SellerDashboardController::class, 'digitalProductCreate']);
    Route::get('/seller/product/{product_id}/edit', [SellerDashboardController::class, 'productCreate']);
    Route::get('/seller/digitalproducts/{product_id}/edit', [SellerDashboardController::class, 'digitalProductCreate']);
    Route::get('/seller/product-bulk-upload/index', [SellerDashboardController::class, 'productBulkUpload']);
    Route::get('/seller/reviews', [SellerDashboardController::class, 'productsReviews']);
    Route::get('/seller/uploads', [SellerDashboardController::class, 'uploads']);
    Route::get('/seller/uploads/create', [SellerDashboardController::class, 'uploadFile']);
    Route::get('/seller/uploads/destroy/{id}', [SellerDashboardController::class, 'deleteFile']);
    Route::get('/seller/uploads/delete-multiple', [SellerDashboardController::class, 'deleteMultiple']);
    Route::get('/seller/packages-payment-list', [SellerDashboardController::class, 'packagesList']);
    Route::get('/seller/pos', [SellerDashboardController::class, 'pos']);
    Route::get('/seller/orders', [SellerDashboardController::class, 'orders']);
    Route::get('/seller/invoice/{id}', [SellerDashboardController::class, 'downloadInvoice']);
    Route::get('/seller/orders/{code}', [SellerDashboardController::class, 'order']);
    Route::get('/seller/refund-request', [SellerDashboardController::class, 'refundRequest']);
    Route::get('/seller/payments', [SellerDashboardController::class, 'vendorPaymentHistory']);
    Route::get('/seller/money-withdraw-requests', [SellerDashboardController::class, 'moneyWithdrawRequest']);
    });
    Route::get('/seller/seller-packages', [SellerDashboardController::class, 'packages']);
    Route::get('/seller/getapproval', [SellerDashboardController::class, 'getapproval']);
});

