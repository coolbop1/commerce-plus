<div class="">
    @if (count($products) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Products</div>
        @if (isset($page))
            <div class="px-3">
                <div id="all-products" class="row gutters-16 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2 border-top border-left">
                    @foreach ($products as $product)
                        <div class="col border-right border-bottom has-transition hov-shadow-out z-1">
                            <div class="aiz-card-box h-auto bg-white py-3 hov-scale-img">
                                <div class="position-relative h-140px h-md-200px img-fit overflow-hidden">
                                            <!-- Image -->
                                    <a href="/product/{{ $product->slug }}" class="d-block h-100">
                                        <img class="mx-auto img-fit has-transition lazyloaded" src="/{{ $product->thumbnail_img }}" data-src="/{{ $product->thumbnail_img }}" alt="{{ $product->name }}" title="{{ $product->name }}" onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                    </a>
                                    @if ($product->hasDiscount())
                                        <!-- Discount percentage tag -->
                                        <span class="absolute-top-left bg-primary ml-1 mt-1 fs-11 fw-700 text-white w-35px text-center" style="padding-top:2px;padding-bottom:2px;">-{{ $product->discountPercentage() }}%</span>
                                    @endif
                                    
                                            <!-- Wholesale tag -->
                                                        <!-- wishlisht & compare icons -->
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishListV2({{ $product->id }})" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a data-value="{{ str_replace('"', "'", json_encode($product)) }}" href="javascript:void(0)" onclick="addToCart ({{ $product->id }}, this, type = 'online')" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <!-- add to cart -->
                                        {{-- <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column justify-content-center align-items-center " href="javascript:void(0)" onclick="showAddToCartModal(161)">
                                            <span class="cart-btn-text">Add to cart</span>
                                            <br>
                                            <span><i class="las la-2x la-shopping-cart"></i></span>
                                        </a> --}}
                                </div>

                                <div class="p-2 p-md-3 text-left">
                                    <!-- Product name -->
                                    <h3 class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-center">
                                        <a href="/product/{{ $product->slug }}" class="d-block text-reset hov-text-primary" title="{{ $product->name }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="fs-14 d-flex justify-content-center mt-3">
                                                <!-- Previous price -->
                                                @if ($product->hasDiscount())
                                                    <div class="disc-amount has-transition">
                                                        <del class="fw-400 text-secondary mr-1">₦{{ number_format($product->price, 2) }}</del>
                                                    </div>
                                                @endif
                                                
                                            <!-- price -->
                                            <div class="">
                                                <span class="fw-700 text-primary">₦{{ number_format($product->new_price, 2) }}</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        @else
        <ul class="list-group list-group-raw">
            @foreach ($products as $key => $product)
                <li class="list-group-item">
                    <a class="text-reset" href="/product/{{ $product->slug }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="mr-3">
                                <img class="size-40px img-fit rounded" src="/{{ $product->thumbnail_img }} alt="{{ $product->name }}"
                                onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"">
                            </div>
                            <div class="flex-grow-1 overflow--hidden minw-0">
                                <div class="product-name text-truncate fs-14 mb-5px">
                                    {{  $product->name }}
                                </div>
                                <div class="">
                                    @if($product->newprice != $product->price)
                                        <del class="opacity-60 fs-15">₦{{ number_format($product->price, 2) }}</del>
                                    @endif
                                    <span class="fw-600 fs-16 text-primary">₦{{ number_format($product->newprice, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
        
    @endif
</div>
<div class="">
    @if (count($categories) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Category Suggestions</div>
        <ul class="list-group list-group-raw">
            @foreach ($categories as $key => $category)
            @php
                $categoryName = $category->name;
                $name_string = str_replace(' ', '_',$categoryName);
                $cat_name = str_replace('-', ':::', $categoryName);
                $cat_name_slug = str_replace(' ', '-', $cat_name);
            @endphp
                <li class="list-group-item py-1">
                    <a class="text-reset hov-text-primary" href="/category/{{ $cat_name_slug }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="">
    @if (count($shops) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Shops</div>
        <ul class="list-group list-group-raw">
            @foreach ($shops as $key => $store)
                <li class="list-group-item">
                    <a class="text-reset" href="/shop/{{ str_replace(' ', '-', $store->name) }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="mr-3">
                                <img class="size-40px img-fit rounded" src="/{{ $store->logo }}"  onerror="this.onerror=null;this.src='/uploads/store_logo_placeholder.png';">
                            </div>
                            <div class="flex-grow-1 overflow--hidden">
                                <div class="product-name text-truncate fs-14 mb-5px">
                                    {{ $store->name }}
                                </div>
                                <div class="opacity-60">
                                    {{ $store->address }}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
