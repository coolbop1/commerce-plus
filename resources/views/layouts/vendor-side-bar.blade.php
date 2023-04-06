@section('vendor-side-bar-menu')
<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <div class="d-block text-center my-3">
                    <img class="mw-100 mb-3" src="/{{ $store->shop_logo ?? 'uploads/store_logo_placeholder.png' }}" class="brand-icon"alt="">
                    <ul class="aiz-side-nav-list">
                        <li onclick="return expandStoreList()" class="aiz-side-nav-item" style="cursor: pointer">
                            <a class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><h3 class="fs-16  m-0 text-primary">{{ $store->name }}</h3></span>
                                <span id='expand-icon' class="aiz-side-nav-arrow"></span>
                            </a>
                        </li>
                        @php
                            $remaining_stores = $user->stores->where('id', '<>', $store->id);
                        @endphp
                        <ul id="other-store-list" class="aiz-side-nav-list minimize">
                        @foreach ($remaining_stores as $store_)
                            <li onclick="return switchStore({{ $store_->id }})" class="aiz-side-nav-item" style="cursor: pointer">
                                <a class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ $store_->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </ul>
            </div>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm" type="text"
                    name="" placeholder="Search in menu" id="menu-search"
                    onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="/seller/dashboard" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text {{ $page == 'dashboard' ? 'active' : '' }}">Dashboard</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text {{ $page == 'products' ? 'active' : '' }}">Products</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="/seller/products"
                                class="aiz-side-nav-link {{ $page == 'products' ? 'active' : '' }}">
                                <span class="aiz-side-nav-text">Products</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="/seller/product-bulk-upload/index"
                                class="aiz-side-nav-link ">
                                <span class="aiz-side-nav-text">Product Bulk Upload</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="/seller/digitalproducts"
                                class="aiz-side-nav-link ">
                                <span class="aiz-side-nav-text">Digital Products</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="/seller/reviews"
                                class="aiz-side-nav-link ">
                                <span class="aiz-side-nav-text">Product Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="/seller/uploads"
                        class="aiz-side-nav-link ">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Uploaded Files</span>
                    </a>
                </li>
                                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Package</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="/seller/seller-packages" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Packages</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="/seller/packages-payment-list" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">Purchase Packages</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                                                    {{-- <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/seller/coupon"
                            class="aiz-side-nav-link ">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Coupon</span>
                        </a>
                    </li> --}}
                                                    {{-- <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/seller/wholesale-products"
                            class="aiz-side-nav-link ">
                            <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Wholesale Products</span>
                        </a>
                    </li> --}}
                                                    {{-- <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-gavel aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Auction</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="https://demo.activeitzone.com/ecommerce/seller/auction_products"
                                    class="aiz-side-nav-link ">
                                    <span
                                        class="aiz-side-nav-text">All Auction Products</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="https://demo.activeitzone.com/ecommerce/seller/auction_products-orders"
                                    class="aiz-side-nav-link ">
                                    <span
                                        class="aiz-side-nav-text">Auction Product Orders</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                                                                            <li class="aiz-side-nav-item">
                            <a href="/seller/pos"
                                class="aiz-side-nav-link ">
                                <i class="las la-fax aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">POS Manager</span>
                            </a>
                        </li>
                                                    <li class="aiz-side-nav-item {{ $page == 'orders' ? 'active' : '' }}">
                    <a href="/seller/orders"
                        class="aiz-side-nav-link ">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text {{ $page == 'orders' ? 'active' : '' }}">Orders</span>
                    </a>
                </li>
                                    <li class="aiz-side-nav-item">
                        <a href="/seller/refund-request"
                            class="aiz-side-nav-link ">
                            <i class="las la-backward aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Received Refund Request</span>
                        </a>
                    </li>
                

                <li class="aiz-side-nav-item">
                    <a href="/seller/shop"
                        class="aiz-side-nav-link {{ $page == 'shop' ? 'active' : '' }}">
                        <i class="las la-cog aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Shop Setting</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="/seller/payments"
                        class="aiz-side-nav-link ">
                        <i class="las la-history aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Payment History</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="/seller/money-withdraw-requests"
                        class="aiz-side-nav-link ">
                        <i class="las la-money-bill-wave-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Money Withdraw</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-file-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Manage Admins</span>
                    </a>
                </li>

                                                        {{-- <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/seller/conversations"
                            class="aiz-side-nav-link ">
                            <i class="las la-comment aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Conversations</span>
                                                    </a>
                    </li>
                
                                    <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/seller/product-queries"
                            class="aiz-side-nav-link ">
                            <i class="las la-question-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Product Queries</span>

                        </a>
                    </li>
                 --}}
                                <li class="aiz-side-nav-item">
                    <a href="#"ß
                        class="aiz-side-nav-link ">
                        <i class="las la-atom aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Support Ticket</span>
                                                    <span class="badge badge-inline badge-success">2</span>
                                            </a>
                </li>

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
@endsection