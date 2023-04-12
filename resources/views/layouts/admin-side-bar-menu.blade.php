@section('admin-side-bar-menu')
<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="/" class="d-block text-left">
                                    <img class="mw-100" src="/uploads/logo.png" class="brand-icon" alt="">
                            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <select onchange="return switchStore(this.value, '/admin')" value="{{ $store ? $store->id : '' }}" class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="state_id" required>
                    <option value="">Pick a store</option>
                    @foreach ($stores as $store_)
                        <option {{ $store_->id == optional($store)->id ? 'selected' : '' }} value="{{ $store_->id }}">{{ $store_->name }}</option>
                    @endforeach
                </select>
            </div>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                
                
                                    <li class="aiz-side-nav-item">
                        <a href="/admin" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Dashboard</span>
                        </a>
                    </li>
                
                <!-- POS Addon-->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-tasks aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">POS System</span>
                                                            {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                        <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="/admin/pos" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">POS Manager</span>
                                    </a>
                                </li>
                                                                                        {{-- <li class="aiz-side-nav-item">
                                    <a href="/admin/pos-activation" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">POS Configuration</span>
                                    </a>
                                </li> --}}
                                                    </ul>
                    </li>
                
                <!-- Product -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Products</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a class="aiz-side-nav-link" href="/admin/products/create">
                                        <span class="aiz-side-nav-text">Add New product</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/products/all" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">All Products</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/products/admin" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">In House Products</span>
                                    </a>
                                </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/products/seller" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Seller Products</span>
                                        </a>
                                    </li>
                                                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/digitalproducts" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Digital Products</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/product-bulk-upload/index" class="aiz-side-nav-link" >
                                        <span class="aiz-side-nav-text">Bulk Import</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/product-bulk-export" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bulk Export</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/categories" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Category</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/brands" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">Brand</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/attributes" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Attribute</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/colors" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Colors</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/reviews" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Product Reviews</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Auction Product -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-gavel aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Auction Products</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <!--Submenu-->
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a class="aiz-side-nav-link" href="https://demo.activeitzone.com/ecommerce/admin/auction-product/create">
                                            <span class="aiz-side-nav-text">Add New auction product</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/auction/all-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">All Auction Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/auction/inhouse-products" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Inhouse Auction Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/auction/seller-products" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Seller Auction Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/auction_products-orders" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Auction Products Orders</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Wholesale Product -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Wholesale Products</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a class="aiz-side-nav-link" href="https://demo.activeitzone.com/ecommerce/admin/wholesale-product/create">
                                            <span class="aiz-side-nav-text">Add new wholesale product</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/wholesale/all-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">All wholesale products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/wholesale/inhouse-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">In House Wholesale Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/wholesale/seller-products" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Seller Wholesale Products</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Sale -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-money-bill aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Sales</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/all_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Orders</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/inhouse-orders" class="aiz-side-nav-link " >
                                        <span class="aiz-side-nav-text">Inhouse orders</span>
                                    </a>
                                </li>
                            
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/seller_orders" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Orders</span>
                                    </a>
                                </li>
                                                        
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/orders_by_pickup_point" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pick-up Point Order</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Deliver Boy Addon-->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-truck aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Delivery Boy</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="/admin/delivery-boys" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">All Delivery Boy</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="/admin/delivery-boys/create" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Add Delivery Boy</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boys-payment-histories" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Payment Histories</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boys-collection-histories" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Collected Histories</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boy/cancel-request" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Cancel Request</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boy-configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Configuration</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Refund addon -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-backward aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Refunds</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/refund-request-all" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Refund Requests</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/paid-refund" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Approved Refunds</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/rejected-refund" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Rejected Refunds</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/refund-request-config" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Refund Configuration</span>
                                        </a>
                                    </li>
                                  
                            </ul>
                        </li>
                                    
                <!-- Customers -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Customers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/customers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Customer list</span>
                                    </a>
                                </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/classified_products" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Classified Products</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/customer_packages" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Classified Packages</span>
                                        </a>
                                    </li>
                                                                                    </ul>
                    </li>
                
                <!-- Sellers -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Sellers</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                                                        <a href="https://demo.activeitzone.com/ecommerce/admin/sellers" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Seller</span>
                                                                            </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/seller/payments" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payouts</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/withdraw_requests_all" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payout Requests</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/vendor_commission" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Commission</span>
                                    </a>
                                </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/seller_packages" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Seller Packages</span>
                                                                                            {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                                    </a>
                                    </li>
                                                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/verification/form" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Seller Verification Form</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                
                <li class="aiz-side-nav-item">
                    <a href="https://demo.activeitzone.com/ecommerce/admin/uploaded-files" class="aiz-side-nav-link ">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Uploaded Files</span>
                    </a>
                </li>

                <!-- Reports -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Reports</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/in_house_sale_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">In House Product Sale</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/seller_sale_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Seller Products Sale</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/stock_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products Stock</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/wish_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Products wishlist</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/user_search_report" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">User Searches</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/commission-log" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Commission History</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/wallet-history" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Wallet Recharge History</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                                
                <!--Blog System-->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Blog System</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/blog" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All Posts</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/blog-category" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Categories</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- marketing -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Marketing</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/flash_deals" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Flash deals</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/newsletter" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Newsletters</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/sms" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bulk SMS</span>
                                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                            </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/subscribers" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Subscribers</span>
                                    </a>
                                </li>
                                                                                    <li class="aiz-side-nav-item">
                                <a href="https://demo.activeitzone.com/ecommerce/admin/coupon" class="aiz-side-nav-link ">
                                    <span class="aiz-side-nav-text">Coupon</span>
                                </a>
                            </li>
                                                    </ul>
                    </li>
                
                <!-- Support -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-link aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Support</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/support_ticket" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Ticket</span>
                                        <span class="badge badge-info">2</span>                                    </a>
                                </li>
                                                        
                                                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/conversations" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Product Conversations</span>
                                                                            </a>
                                </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/product-queries"
                                            class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Product Queries</span>                           
                                        </a>
                                    </li>
                                                                                    </ul>
                    </li>
                
                <!-- Affiliate Addon -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-link aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Affiliate System</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/affiliate/configs" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Affiliate Registration Form</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/affiliate" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Affiliate Configurations</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/affiliate/users" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Affiliate Users</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/refferal/users" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Referral Users</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/affiliate/withdraw_requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Affiliate Withdraw Requests</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/affiliate/logs" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Affiliate Logs</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Offline Payment Addon-->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Offline Payment System</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/manual_payment_methods" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Manual Payment Methods</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/offline-wallet-recharge-requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Offline Wallet Recharge</span>
                                        </a>
                                    </li>
                                                                
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/offline-customer-package-payment-requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Offline Customer Package Payments</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/offline-seller-package-payment-requests" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Offline Seller Package Payments</span>
                                                                                            {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                                    </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Paytm Addon -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-mobile-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Asian Payment Gateway</span>
                                                            {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                        <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="https://demo.activeitzone.com/ecommerce/admin/paytm_configuration" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Set Asian PG Credentials</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                
                <!-- Club Point Addon-->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="lab la-btc aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Club Point System</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/club-points/configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Club Point Configurations</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/set-club-points" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">Set Product Point</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/club-points/index" class="aiz-side-nav-link ">
                                            <span class="aiz-side-nav-text">User Points</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!--OTP addon -->
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-phone aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">OTP System</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/otp-configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">OTP Configurations</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/sms-templates" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">SMS Templates</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/otp-credentials-configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Set OTP Credentials</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                                                            <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-phone aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">African Payment Gateway Addon</span>
                                                                    {{-- <span class="badge badge-inline badge-danger">Addon</span> --}}
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/african/configuration" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">African PG Configurations</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/african/credentials_index" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">Set African PG Credentials</span>
                                        </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Website Setup -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link " >
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Website Setup</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/website/header" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Header</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/website/footer?lang=en" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Footer</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/website/pages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pages</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/website/appearance" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Appearance</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Setup & Configurations -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Setup &amp; Configurations</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/general-setting" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">General Settings</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/activation" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Features activation</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/languages" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Languages</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/currency" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Currency</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/tax" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Vat &amp; TAX</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/pick_up_points" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Pickup point</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/smtp-settings" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">SMTP Settings</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/payment-method" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payment Methods</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/order-configuration" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Order Configuration</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/file_system" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">File System &amp; Cache Configuration</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/social-login" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Social media Logins</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Facebook</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/facebook-chat" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Facebook Chat</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/facebook-comment" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Facebook Comment</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Google</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/google-analytics" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Analytics Tools</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/google-recaptcha" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google reCAPTCHA</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/google-map" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google Map</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/google-firebase" class="aiz-side-nav-link">
                                                    <span class="aiz-side-nav-text">Google Firebase</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Shipping</span>
                                        <span class="aiz-side-nav-arrow"></span>
                                    </a>
                                    <ul class="aiz-side-nav-list level-3">
                                                                                    <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/shipping_configuration" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Configuration</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/countries" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Countries</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/states" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping States</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/cities" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Cities</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/zones" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Zones</span>
                                                </a>
                                            </li>
                                                                                                                            <li class="aiz-side-nav-item">
                                                <a href="https://demo.activeitzone.com/ecommerce/admin/carriers" class="aiz-side-nav-link ">
                                                    <span class="aiz-side-nav-text">Shipping Carrier</span>
                                                </a>
                                            </li>
                                                                            </ul>
                                </li>
                                                    </ul>
                    </li>
                
                <!-- Staffs -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Staffs</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/staffs" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">All staffs</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/roles" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Staff permissions</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                
                
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">System</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/system/update" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Update</span>
                                    </a>
                                </li>
                                                                                    <li class="aiz-side-nav-item">
                                <a href="https://demo.activeitzone.com/ecommerce/admin/system/server-status" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Server status</span>
                                </a>
                            </li>
                                                    </ul>
                    </li>
                
                <!-- Addon Manager -->
                                    <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/admin/addons" class="aiz-side-nav-link ">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Addon Manager</span>
                        </a>
                    </li>
                            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
@endsection