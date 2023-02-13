@extends('layouts.admin')

@section('content')

	<div class="aiz-main-wrapper">
        <div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="https://demo.activeitzone.com/ecommerce/admin" class="d-block text-left">
                                    <img class="mw-100" src="https://demo.activeitzone.com/ecommerce/public/assets/img/logo.png" class="brand-icon" alt="">
                            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="Search in menu" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                
                
                                    <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/admin" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Dashboard</span>
                        </a>
                    </li>
                
                <!-- POS Addon-->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-tasks aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">POS System</span>
                                                            <span class="badge badge-inline badge-danger">Addon</span>
                                                        <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                                                            <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/pos" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">POS Manager</span>
                                    </a>
                                </li>
                                                                                        <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin/pos-activation" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">POS Configuration</span>
                                    </a>
                                </li>
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
                                    <a class="aiz-side-nav-link" href="https://demo.activeitzone.com/ecommerce/admin/products/create">
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
                                                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boys" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">All Delivery Boy</span>
                                        </a>
                                    </li>
                                                                                                    <li class="aiz-side-nav-item">
                                        <a href="https://demo.activeitzone.com/ecommerce/admin/delivery-boys/create" class="aiz-side-nav-link">
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                                            <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                                            <span class="badge badge-inline badge-danger">Addon</span>
                                                                                    </a>
                                    </li>
                                                            </ul>
                        </li>
                                    
                <!-- Paytm Addon -->
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-mobile-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Asian Payment Gateway</span>
                                                            <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
                                                                    <span class="badge badge-inline badge-danger">Addon</span>
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
		<div class="aiz-content-wrapper">
            <div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="https://demo.activeitzone.com/ecommerce" target="_blank" title="Browse Website">
                            <i class="las la-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
                            <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                    <div class="aiz-topbar-item">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-icon btn-circle btn-light" href="https://demo.activeitzone.com/ecommerce/admin/pos" target="_blank" title="POS">
                                <i class="las la-print"></i>
                            </a>
                        </div>
                    </div>
                </div>
                        <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-soft-danger btn-sm d-flex align-items-center" href="https://demo.activeitzone.com/ecommerce/admin/clear-cache">
                            <i class="las la-hdd fs-20"></i>
                            <span class="fw-500 ml-1 mr-0 d-none d-md-block">Clear Cache</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <i class="las la-bell fs-24"></i>
                                                                    <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220912-10085522 has been Delivered
                                                    </p>
                                                    <small class="text-muted">
                                                        September 12 2022, 12:09 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220912-10085522 has been Paid
                                                    </p>
                                                    <small class="text-muted">
                                                        September 12 2022, 12:09 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220912-10085522 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        September 12 2022, 12:09 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220906-10185640 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        September 6 2022, 12:19 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220906-10155759 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        September 6 2022, 12:16 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220829-07250551 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 9:25 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220828-13023343 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 3:02 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220828-12334652 has been Delivered
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 2:34 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220828-12334652 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 2:33 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220828-12334652 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 2:33 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220828-12322996 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        August 28 2022, 2:32 am
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08275357 has been Delivered
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:28 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08275357 has been Paid
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:28 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08275357 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:27 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08040637 has been Delivered
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:05 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08040637 has been Paid
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:05 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220726-08040637 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        July 25 2022, 10:04 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220612-09093535 has been Placed
                                                    </p>
                                                    <small class="text-muted">
                                                        June 11 2022, 11:09 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220602-13204496 has been Delivered
                                                    </p>
                                                    <small class="text-muted">
                                                        June 11 2022, 11:04 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                                                                    <p class="mb-1 text-truncate-2">
                                                        Order code: 20220602-13204496 has been Paid
                                                    </p>
                                                    <small class="text-muted">
                                                        June 11 2022, 11:04 pm
                                                    </small>
                                                                                            </div>
                                        </div>
                                    </li>
                                                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="https://demo.activeitzone.com/ecommerce/admin/all-notification" class="text-reset d-block py-2">
                                View All Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
                        <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/en.png" height="11">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                                                    <li>
                                <a href="javascript:void(0)" data-flag="en" class="dropdown-item  active ">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/en.png" class="mr-2">
                                    <span class="language">English</span>
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0)" data-flag="bd" class="dropdown-item ">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/bd.png" class="mr-2">
                                    <span class="language">Bangla</span>
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0)" data-flag="sa" class="dropdown-item ">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/sa.png" class="mr-2">
                                    <span class="language">Arabic</span>
                                </a>
                            </li>
                                                    <li>
                                <a href="javascript:void(0)" data-flag="fr" class="dropdown-item ">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/fr.png" class="mr-2">
                                    <span class="language">French</span>
                                </a>
                            </li>
                                            </ul>
                </div>
            </div>

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img
                                    src="https://demo.activeitzone.com/ecommerce/public/uploads/all/jxUqbB2ThpoDFZbBtPHaiy2pF7i02hDaFJEEF9rx.png"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';"
                                >
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">William C. Schroyer</span>
                                <span class="d-block small opacity-60">admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="https://demo.activeitzone.com/ecommerce/admin/profile" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>Profile</span>
                        </a>

                        <a href="https://demo.activeitzone.com/ecommerce/logout" class="dropdown-item">
                            <i class="las la-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
                    <div class="row gutters-10">
    <div class="col-lg-6">
        <div class="row gutters-10">
            <div class="col-6">
                <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Customer
                        </div>
                        <div class="h3 fw-700 mb-3">
                            3
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Order
                        </div>
                        <div class="h3 fw-700 mb-3">77</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Product category
                        </div>
                        <div class="h3 fw-700 mb-3">249</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">Total</span>
                            Product brand
                        </div>
                        <div class="h3 fw-700 mb-3">100</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row gutters-10">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">Products</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-1" class="w-100" height="305"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">Sellers</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-2" class="w-100" height="305"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gutters-10">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0 fs-14">Category wise product sale</h6>
            </div>
            <div class="card-body">
                <canvas id="graph-1" class="w-100" height="500"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0 fs-14">Category wise product stock</h6>
            </div>
            <div class="card-body">
                <canvas id="graph-2" class="w-100" height="500"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="mb-0">Top 12 Products</h6>
    </div>
    <div class="card-body">
        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2" data-arrows='true'>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/analog-black-dial-mens-watch-32-bk-ck" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1quPYqHJkqT3QypO7fg78wEspoNktv69QWNbAvdP.png"
                                    alt="Fossil Men&#039;s Grant Stainless Steel Quartz Chronograph Watch"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$600.000</del>
                                                                <span class="fw-700 text-primary">$450.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/analog-black-dial-mens-watch-32-bk-ck" class="d-block text-reset">Fossil Men&#039;s Grant Stainless Steel Quartz Chronograph Watch</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-qsdro" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/3ql49de5ukMYrHGMfSyFIDa5QOylkhIQ5Y9buMvL.jpg"
                                    alt="Nike Men &#039;Mercurial Superfly 7 Elite Firm Ground Football Shoe"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$15.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-qsdro" class="d-block text-reset">Nike Men &#039;Mercurial Superfly 7 Elite Firm Ground Football Shoe</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/LfCYkZUyEVnUSjqjznaA6MVuLETNLDkaTMnCud9F.png"
                                    alt="Under Armour Men&#039;s Charged Assert 9 Running Shoe"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$120.000</del>
                                                                <span class="fw-700 text-primary">$97.200</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" class="d-block text-reset">Under Armour Men&#039;s Charged Assert 9 Running Shoe</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/latest-coat-pant-designs-white-wedding-suits-for-men-sq38a" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/NEmbbgNnGnM79GkteGwsFcOSzxlRmNoopmSx6d0Y.png"
                                    alt="HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$35.000</del>
                                                                <span class="fw-700 text-primary">$23.800</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/latest-coat-pant-designs-white-wedding-suits-for-men-sq38a" class="d-block text-reset">HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/soft-bamboo-boxers-for-men-cool-comfortable-breathable-mens-underwear-boxer-shorts-4i89i" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/CsFoRGNuvhjcSk9fqioXzZoR1LPMyLx4FyW8Jxdg.png"
                                    alt="Rb3030 Outdoorsman I Aviator Sunglasses"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$95.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/soft-bamboo-boxers-for-men-cool-comfortable-breathable-mens-underwear-boxer-shorts-4i89i" class="d-block text-reset">Rb3030 Outdoorsman I Aviator Sunglasses</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/adidas-womens-cotton-jogger-set-ihfxn" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/vAPrbsvyoO5T8qovvyYsZy7m5bud6yaRqvruRtWz.png"
                                    alt="Adidas Women&#039;s Parma 16 Shorts"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$40.000</del>
                                                                <span class="fw-700 text-primary">$32.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/adidas-womens-cotton-jogger-set-ihfxn" class="d-block text-reset">Adidas Women&#039;s Parma 16 Shorts</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/adiba-womens-regular-fit-joggers-tbg6s" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/mSeg8CuFFKByBwZWAFi0JTpREOY6cTL3JT5VFixe.png"
                                    alt="Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$90.000</del>
                                                                <span class="fw-700 text-primary">$72.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/adiba-womens-regular-fit-joggers-tbg6s" class="d-block text-reset">Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xIT7SLG4ciNvO2z4cU47GhtmS1RDiRBlnbzlYwSu.jpg"
                                    alt="SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$25.000</del>
                                                                <span class="fw-700 text-primary">$14.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" class="d-block text-reset">SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/hp-stream-14-inch-laptop-intel-celeron-n4000-4-gb-ram-64-gb-emmc-windows-10-home-in-s-mode-with-office-365-personal-gtre8" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/KB3mW3VBpQFmVrzqAjsq0Mhh8RF1K2sfXrs5Ym1R.png"
                                    alt="Dell Inspiron 15 3511 15.6 Inch Laptop, Full HD LED Non-Touch WVA Display - Intel Core i3-1115G4, 8GB DDR4 RAM, 256GB SSD"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$1,300.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/hp-stream-14-inch-laptop-intel-celeron-n4000-4-gb-ram-64-gb-emmc-windows-10-home-in-s-mode-with-office-365-personal-gtre8" class="d-block text-reset">Dell Inspiron 15 3511 15.6 Inch Laptop, Full HD LED Non-Touch WVA Display - Intel Core i3-1115G4, 8GB DDR4 RAM, 256GB SSD</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/mens-machine-stainless-steel-quartz-chronograph-watch-2gns4" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/wTxJIHeuG9rlxXSwp1yTS8ptdSwYpOzMrhH5yvf1.jpg"
                                    alt="Men&#039;s Machine Stainless Steel Quartz Chronograph Watch"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$190.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/mens-machine-stainless-steel-quartz-chronograph-watch-2gns4" class="d-block text-reset">Men&#039;s Machine Stainless Steel Quartz Chronograph Watch</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/baby-girls-cotton-dress-cardigan-and-shoe-set" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/2RF080PPtVaUyETTD5MNxxxzfG2QwvAsAfsOExOD.png"
                                    alt="Gerber Unisex-Baby Onesies Bodysuit Multi Pack"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                <span class="fw-700 text-primary">$25.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/baby-girls-cotton-dress-cardigan-and-shoe-set" class="d-block text-reset">Gerber Unisex-Baby Onesies Bodysuit Multi Pack</a>
                            </h3>
                        </div>
                    </div>
                </div>
                            <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md mb-2 has-transition bg-white">
                        <div class="position-relative">
                            <a href="https://demo.activeitzone.com/ecommerce/product/calvin-klein-womens-scuba-sleeveless-princess-seamed-sheath-dress-mnluo" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-210px"
                                    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1TUKIDcKS3huliwtIrAUbILoQEXrDanjLPBV1lbO.png"
                                    alt="Calvin Klein Women&#039;s Scuba Sleeveless Princess Seamed Sheath Dress"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                >
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                                                    <del class="fw-600 opacity-50 mr-1">$150.000</del>
                                                                <span class="fw-700 text-primary">$120.000</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                <a href="https://demo.activeitzone.com/ecommerce/product/calvin-klein-womens-scuba-sleeveless-princess-seamed-sheath-dress-mnluo" class="d-block text-reset">Calvin Klein Women&#039;s Scuba Sleeveless Princess Seamed Sheath Dress</a>
                            </h3>
                        </div>
                    </div>
                </div>
                    </div>
    </div>
</div>


				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy;  v6.5.0</p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    

	<script src="https://demo.activeitzone.com/ecommerce/public/assets/js/vendors.js" ></script>
	<script src="https://demo.activeitzone.com/ecommerce/public/assets/js/aiz-core.js" ></script>

    <script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                'Total published products',
                'Total sellers products',
                'Total admin products'
            ],
            datasets: [
                {
                    data: [
                        149,
                        97,
                        52
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#pie-2',{
        type: 'doughnut',
        data: {
            labels: [
                'Total sellers',
                'Total approved sellers',
                'Total pending sellers'
            ],
            datasets: [
                {
                    data: [
                        10,
                        10,
                        0
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Montserrat',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });
    AIZ.plugins.chart('#graph-1',{
        type: 'bar',
        data: {
            labels: [
                                'Women Clothing &amp; Fashion',
                                'Men Clothing &amp; Fashion',
                                'Computer &amp; Accessories',
                                'Automobile &amp; Motorcycle',
                                'Kids &amp; toy',
                                'Sports &amp; outdoor',
                                'Jewelry &amp; Watches',
                                'Cellphones &amp; Tabs',
                                'Beauty, Health &amp; Hair',
                                'Home Improvement &amp; Tools',
                                'Home decoration &amp; Appliance',
                                'Toy',
                                'Software',
                            ],
            datasets: [{
                label: 'Number of sale',
                data: [
                    19,46,13,1,5,10,5,7,1,0,0,0,2,
                ],
                backgroundColor: [
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                            'rgba(55, 125, 255, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                            'rgba(55, 125, 255, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
    AIZ.plugins.chart('#graph-2',{
        type: 'bar',
        data: {
            labels: [
                                'Women Clothing &amp; Fashion',
                                'Men Clothing &amp; Fashion',
                                'Computer &amp; Accessories',
                                'Automobile &amp; Motorcycle',
                                'Kids &amp; toy',
                                'Sports &amp; outdoor',
                                'Jewelry &amp; Watches',
                                'Cellphones &amp; Tabs',
                                'Beauty, Health &amp; Hair',
                                'Home Improvement &amp; Tools',
                                'Home decoration &amp; Appliance',
                                'Toy',
                                'Software',
                            ],
            datasets: [{
                label: 'Number of Stock',
                data: [
                    227965,54486,35230,6559,27029,990,3496,33997,5000,2500,0,30,-2,
                ],
                backgroundColor: [
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                            'rgba(253, 57, 149, 0.4)',
                                    ],
                borderColor: [
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                            'rgba(253, 57, 149, 1)',
                                    ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
</script>

    <script type="text/javascript">
	    

        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-menu a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('https://demo.activeitzone.com/ecommerce/language',{_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }
        function menuSearch(){
			var filter, item;
			filter = $("#menu-search").val().toUpperCase();
			items = $("#main-menu").find("a");
			items = items.filter(function(i,item){
				if($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#'){
					return item;
				}
			});

			if(filter !== ''){
				$("#main-menu").addClass('d-none');
				$("#search-menu").html('')
				if(items.length > 0){
					for (i = 0; i < items.length; i++) {
						const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
						const link = $(items[i]).attr('href');
						 $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
					}
				}else{
					$("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">Nothing found</span></li>`);
				}
			}else{
				$("#main-menu").removeClass('d-none');
				$("#search-menu").html('')
			}
        }
    </script>
    @endsection