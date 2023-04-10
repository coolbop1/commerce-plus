@section('brand-product-section')
<section class="mb-4 pt-4">
    <div class="container sm-px-0 pt-2">
        <form class="" id="search-form" action="" method="GET">
            <div class="row">

                <!-- Sidebar Filters -->
                <div class="col-xl-3">
                    <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                        <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                        <div class="collapse-sidebar c-scrollbar-light text-left">
                            <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                <h3 class="h6 mb-0 fw-600">Filters</h3>
                                <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" >
                                    <i class="las la-times la-2x"></i>
                                </button>
                            </div>

                            <!-- Categories -->
                            <div class="bg-white border mb-3">
                                <div class="fs-16 fw-700 p-3">
                                    <a href="#collapse_1" class="dropdown-toggle filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                        Categories
                                    </a>
                                </div>
                                <div class="collapse show" id="collapse_1">
                                    <ul class="p-3 mb-0 list-unstyled">
                                        @foreach ($categories as $cat)
                                        @php
                                            $cat_name = str_replace('-',':::', $cat->name);
                                            $cat_name_slug = str_replace(' ', '-', $cat_name);
                                        @endphp 
                                            <li class="mb-3 text-dark">
                                                <a class="text-reset fs-14 hov-text-primary" href="/category/{{ $cat_name_slug }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Price range -->
                            <div class="bg-white border mb-3">
                                <div class="fs-16 fw-700 p-3">
                                    Price range
                                </div>
                                <div class="p-3 mr-3">
                                    <div class="aiz-range-slider">
                                        <div
                                            id="input-slider-range"
                                            data-range-value-min="0"
                                            data-range-value-max="2000000"
                                        ></div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                                                                                data-range-value-low="0"
                                                                                                            id="input-slider-range-value-low"
                                                ></span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                                                                                data-range-value-high="2000000"
                                                                                                            id="input-slider-range-value-high"
                                                ></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input id="brand_id" type="hidden" value="{{ $brand->id }}">
                                 <label for="min_price"> &nbsp; Min Price</label>
                                 <input class="form-control" onchange="filter(brand = true)" id="min_price" type="number" name="min_price" value="0.00">
                                 <br>
                                 <label  for="max_price"> &nbsp; Max Price</label>
                                 <input class="form-control" onchange="filter(brand = true)" id="max_price" type="number" name="max_price" value="2000000">
                                 <br>
                            </div>
                        </div>
                    </div>
                </div>






                    <!-- Contents -->
                    <div class="col-xl-9">
                        
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb bg-transparent py-0 px-1">
                            <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                                <a class="text-reset" href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                                <a class="text-reset" href="/brands">Brands</a>
                            </li>
                              <li class="breadcrumb-item fw-700  text-dark">
                                    "{{ $brand->name }}"
                                </li>
                        </ul>
                        
                        <!-- Top Filters -->
                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                                                                    All Products
                                                                            </h1>
                                    <input type="hidden" name="keyword" value="">
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                                                                    </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <select id="sort_by" class="form-control form-control-sm aiz-selectpicker rounded-0" name="sort_by" onchange="filter(brand = true)">
                                        <option value="">Sort By</option>
                                        <option value="newest" >Newest</option>
                                        <option value="oldest" >Oldest</option>
                                        <option value="price-asc" >Price low to high</option>
                                        <option value="price-desc" >Price high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Products -->
                        <div class="px-3">
                            <div id="all-products" class="row gutters-16 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2 border-top border-left">
                                    @foreach ($brand->products as $product)
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
                        <div class="aiz-pagination mt-4">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection