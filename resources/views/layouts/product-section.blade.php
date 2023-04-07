@section('product-section')
<section class="mb-4 pt-3">
    <div class="container">
        <div class="bg-white py-3">
            <div class="row">
                <!-- Product Image Gallery -->
                <div class="col-xl-5 col-lg-6 mb-4">
                    <div class="sticky-top z-3 row gutters-10">
                        @php
                            $product_images = $product->thumbnail_img ? explode(',', $product->thumbnail_img.','.$product->photos) : []; 
                        @endphp
                        <!-- Gallery Images -->
                        <div class="col-12">
                            <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'  data-arrows='true'>

                                @foreach ($product_images as $product_image)
                                    <div class="carousel-box img-zoom rounded-0">
                                        <img class="img-fluid h-auto lazyload mx-auto"
                                            src="/assets/img/placeholder.jpg"
                                            data-src="/{{ $product_image }}"
                                            onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                    </div>
                                @endforeach
                                                                            
                            </div>
                        </div>


                        <div class="col-12 mt-3 d-none d-lg-block">
                            <div class="aiz-carousel product-gallery-thumb" data-items='7' data-nav-for='.product-gallery' data-focus-select='true' data-arrows='true' data-vertical='false' data-auto-height='true'>

                                @foreach ($product_images as $product_image)
                                    <div class="carousel-box c-pointer rounded-0">
                                        <img class="lazyload mw-100 size-60px mx-auto border p-1"
                                            src="/assets/img/placeholder.jpg"
                                            data-src="/{{ $product_image }}"
                                            onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-xl-7 col-lg-6">
                    <div class="text-left">
                        <!-- Product Name -->
                        <h1 class="mb-4 fs-16 fw-700 text-dark">
                            {{ $product->name }}
                        </h1>

                        <div class="row align-items-center mb-3">
                        <!-- Review -->
                            <div class="col-12">
                                <span class="rating rating-mr-1">
                                    <i class = 'las la-star {{ $product->rating() >= 1 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 2 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 3 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 4 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 5 ? 'active' : '' }}'></i>
                                </span>
                                <span class="ml-1 opacity-50 fs-14">(0 reviews)</span>
                            </div>
                                <!-- Estimate Shipping Time -->
                                <!-- In stock -->
                        </div>
                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <div class="d-flex">
                                    <!-- Add to wishlist button -->
                                    <a href="javascript:void(0)" onclick="addToWishListV2({{ $product->id }})" class="mr-3 fs-14 text-dark opacity-60 has-transitiuon hov-opacity-100">
                                        <i class="la la-heart-o mr-1"></i>
                                        Add to wishlist
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Brand Logo & Name -->
                        <div class="d-flex flex-wrap align-items-center mb-3">
                            <span class="text-secondary fs-14 fw-400 mr-4 w-50px">Brand</span><br>
                            <a href="/brand/{{ str_replace(' ', '_', optional(optional($product)->brand)->name) }}" class="text-reset hov-text-primary fs-14 fw-700">{{ optional(optional($product)->brand)->name }}</a>
                        </div>

                        <!-- Seller Info -->
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="d-flex align-items-center mr-4">
                                <!-- Shop Name -->
                                <p class="mb-0 fs-14 fw-700">Inhouse product</p>
                            </div>
                        </div>

                    <hr>

                                        <!-- Choice Options -->
                                                                
                            <!-- Color Options -->
                            
                            <!-- Quantity + Add to cart -->
                            <div class="row no-gutters mb-3">
                                <div class="col-sm-2">
                                    <div class="text-secondary fs-14 fw-400 mt-2">Quantity</div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="product-quantity d-flex align-items-center">
                                        <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                            <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" 
                                                type="button" data-type="minus" data-field="quantity" disabled="">
                                                <i class="las la-minus"></i>
                                            </button>
                                            <input type="number" name="quantity" 
                                                class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" 
                                                value="1" min="{{ $product->min_qty }}" lang="en">
                                            <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button" data-type="plus" data-field="quantity">
                                                <i class="las la-plus"></i>
                                            </button>
                                        </div>
                                                                    <div class="avialable-amount opacity-60">
                                                                        </div>
                                    </div>
                                </div>
                            </div>
            
                                    
                        <!-- Total Price -->
                        <div class="row no-gutters pb-3" id="chosen_price_div">
                            <div class="col-sm-2">
                                <div class="text-secondary fs-14 fw-400 mt-1">Total Price</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="product-price">
                                    <strong id="chosen_price" class="fs-20 fw-700 text-primary">
                                        ₦<span id="product-total-price-">{{ number_format($product->newPrice(), 2) }}</span>
                                    </strong>
                                </div>
                            </div>
                        </div>
            
                    <!-- Add to cart & Buy now Buttons -->
                    <div class="mt-3">
                                    <button data-value="{{ str_replace('"', "'", json_encode($product)) }}" type="button" class="btn btn-warning mr-2 add-to-cart fw-600 w-150px rounded-0 text-white"
                        onclick="addToCart({{ $product->id }}, this, 'online' )">
                        <i class="las la-shopping-bag"></i>
                        <span class="d-none d-md-inline-block"> Add to cart</span>
                        </button>
                        <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart w-150px rounded-0" onclick="buyNow()">
                        <i class="la la-shopping-cart"></i> Buy Now
                        </button>
                        <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                        <i class="la la-cart-arrow-down"></i> Out of Stock
                        </button>
                    </div>

                        <!-- Promote Link -->
                        <div class="d-table width-100 mt-3">
                        <div class="d-table-cell">
                        </div>
                        </div>
                        <!-- Refund -->
                        @if ($product->refundable)
                            <div class="row no-gutters mt-3">
                                <div class="col-sm-2">
                                    <div class="text-secondary fs-14 fw-400 mt-2">Refund</div>
                                </div>
                                <div class="col-sm-10">
                                    <a href="/return-policy" target="_blank">
                                            <img src="/assets/img/refund-sticker.jpg" height="36">
                                    </a>
                                    <a href="/return-policy" class="text-blue hov-text-primary fs-14 ml-3" target="_blank">View Policy</a>
                                </div>
                            </div>
                        @endif
                        


                    </div>
                </div>




            </div>
        </div>
    </div>

</section>






























<section class="mb-4">
    <div class="container">
                        <div class="row gutters-16">
                <!-- Left side -->
                <div class="col-lg-3">
                    <!-- Seller Info -->
                    
                    <!-- Top Selling Products -->
                   <div class="d-none d-lg-block">
                        <div class="bg-white border mb-4">
<div class="p-3 p-sm-4 fs-16 fw-600">
    Top Selling Products
</div>
<div class="px-3 px-sm-4 pb-4">
    <ul class="list-group list-group-flush">
        @foreach ($top_selling_products as $s_product)
            @php
            $s_product = $s_product->product;
            @endphp
                <li class="py-3 px-0 list-group-item border-0">
                    <div class="row gutters-10 align-items-center hov-scale-img hov-shadow-md overflow-hidden has-transition">
                        <div class="col-xl-4 col-lg-6 col-4">
                            <!-- Image -->
                            <a href="/product/{{ str_replace(' ', '_',$s_product->name) }}"
                                class="d-block text-reset">
                                <img class="img-fit lazyload h-80px h-md-150px h-lg-80px has-transition"
                                    src="/assets/img/placeholder.jpg"
                                    data-src="/{{ $s_product->thumbnail_img }}"
                                    alt="{{ $s_product->name }}"
                                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                            </a>
                        </div>
                        <div class="col text-left">
                            <!-- Product name -->
                            <div class="d-lg-none d-xl-block mb-3">
                                <h4 class="fs-14 fw-400 text-truncate-2">
                                    <a href="/product/{{ str_replace(' ', '_',$s_product->name) }}"
                                        class="d-block text-reset hov-text-primary">{{ $s_product->name }}</a>
                                </h4>
                            </div>
                            <div class="">
                                <!-- Price -->
                                <span class="fs-14 fw-700 text-primary">₦{{ number_format($s_product->newPrice(), 2) }}</span>
                                <!-- Home Price -->
                                @if ($s_product->hasDiscount())
                                    <del class="fs-14 fw-700 opacity-60 ml-1 ml-lg-0 ml-xl-1">₦{{ number_format($s_product->price, 2) }}</del> 
                                @endif

                            </div>
                        </div>
                    </div>
                </li>
        @endforeach
    </ul>
</div>
</div>                       </div>
                </div>

                <!-- Right side -->
                <div class="col-lg-9">
                    
                    <!-- Reviews & Ratings -->
                    <div class="bg-white border mb-4">
<div class="p-3 p-sm-4">
    <h3 class="fs-16 fw-700 mb-0">
        <span class="mr-4">Reviews &amp; Ratings</span>
    </h3>
</div>
<!-- Ratting -->
<div class="px-3 px-sm-4 mb-4">
    <div class="border border-warning bg-soft-warning p-3 p-sm-4">
        <div class="row align-items-center">
            <div class="col-md-8 mb-3">
                <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                    <div class="w-100 w-sm-auto">
                        <span class="fs-36 mr-3">{{ $product->rating() }}</span>
                        <span class="fs-14 mr-3">out of 5.0</span>
                    </div>
                    <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                        <span class="rating rating-mr-1">
                            <i class = 'las la-star {{ $product->rating() >= 1 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 2 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 3 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 4 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 5 ? 'active' : '' }}'></i>
                        </span>
                        <span class="ml-1 fs-14">({{ $reviews->count() }}
                            reviews)</span>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 text-right">
                <a  href="javascript:void(0);" onclick="product_review('131')" 
                    class="btn btn-warning fw-400 rounded-0 text-white">
                    <span class="d-md-inline-block"> Rate this Product</span>
                </a>
            </div> --}}
        </div>
    </div>
</div>
<!-- Reviews -->
<div class="py-3 reviews-area">
<ul class="list-group list-group-flush">
    @foreach ($reviews as $cart)
        <li class="media list-group-item d-flex px-3 px-md-4 border-0">
            <!-- Review User Image -->
            <span class="avatar avatar-md mr-3">
                <img class="lazyload"
                    src="/assets/img/placeholder.jpg"
                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"
                    data-src="/assets/img/avatar-place.png"
                >
            </span>
            <div class="media-body text-left">
                <!-- Review User Name -->
                <h3 class="fs-15 fw-600 mb-0">{{ optional(optional($cart)->user)->name }}
                </h3>
                <!-- Review Date -->
                <div class="opacity-60 mb-1">
                    {{ Carbon\Carbon::parse($cart->updated_at)->format("d-m-Y") }}
                </div>
                <!-- Review ratting -->
                <span class="rating rating-mr-1">
                    <i class = 'las la-star {{ $cart->ratings >= 1 ? 'active' : '' }}'></i><i class = 'las la-star {{ $cart->ratings >= 2 ? 'active' : '' }}'></i><i class = 'las la-star {{ $cart->ratings >= 3 ? 'active' : '' }}'></i><i class = 'las la-star {{ $cart->ratings >= 4 ? 'active' : '' }}'></i><i class = 'las la-star {{ $cart->ratings >= 5 ? 'active' : '' }}'></i>
                </span>
                <!-- Review Comment -->
                <p class="comment-text mt-2 fs-14">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                </p>
                <!-- Review Images -->
                <div class="spotlight-group d-flex flex-wrap">
                </div>
                <!-- Variation -->
                <small class="text-secondary fs-12">Variation : Black</small>
            </div>
        </li>
    @endforeach                            
</ul>

    
<!-- Pagination -->
<div class="aiz-pagination product-reviews-pagination py-2 px-4 d-flex justify-content-end">
    
</div>
</div>
</div>
                    <!-- Description, Video, Downloads -->
                    <div class="bg-white mb-4 border p-3 p-sm-4">
<!-- Tabs -->
<div class="nav aiz-nav-tabs">
    <a href="#tab_default_1" data-toggle="tab"
        class="mr-5 pb-2 fs-16 fw-700 text-reset active show">Description</a>
                <a href="#tab_default_2" data-toggle="tab"
            class="mr-5 pb-2 fs-16 fw-700 text-reset">Video</a>
                </div>

<!-- Description -->
<div class="tab-content pt-0">
    <!-- Description -->
    <div class="tab-pane fade active show" id="tab_default_1">
        <div class="py-5">
            <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                <ul class="a-unordered-list a-vertical a-spacing-mini" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;"><li style="list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="overflow-wrap: break-word; display: block;"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">{{ $product->detail }}</span><br></span></li></ul>                </div>
        </div>
    </div>

    <!-- Video -->
    <div class="tab-pane fade" id="tab_default_2">
        <div class="py-5">
            <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                        src="{{ $product->video_link }}"></iframe>
                                </div>
        </div>
    </div>
    
    <!-- Download -->
    <div class="tab-pane fade" id="tab_default_3">
        <div class="py-5 text-center ">
            <a href="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                class="btn btn-primary">Download</a>
        </div>
    </div>
</div>
</div>                        
                    <!-- Related products -->
                    <div class="bg-white border">
                    <div class="p-3 p-sm-4">
                        <h3 class="fs-16 fw-700 mb-0">
                            <span class="mr-4">Related products</span>
                        </h3>
                    </div>
                    <div class="px-4">
                        <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
                            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
                            data-arrows='true' data-infinite='true'>
                            @foreach ($related_products as $r_product)
                                <div class="carousel-box">
                                    <div class="aiz-card-box hov-shadow-md my-2 has-transition hov-scale-img">
                                        <div class="">
                                            <a href="/product/{{ str_replace(' ', '_',$r_product->name) }}"
                                                class="d-block">
                                                <img class="img-fit lazyload mx-auto h-140px h-md-190px has-transition"
                                                    src="/assets/img/placeholder.jpg"
                                                    data-src="/{{ $r_product->thumbnail_img }}"
                                                    alt="{{ $r_product->name }}"
                                                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                            </a>
                                        </div>
                                        <div class="p-md-3 p-2 text-center">
                                            <h3 class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="/product/{{ str_replace(' ', '_',$r_product->name) }}"
                                                    class="d-block text-reset hov-text-primary">{{ $r_product->name }}</a>
                                            </h3>
                                            <div class="fs-14 mt-3">
                                                <span class="fw-700 text-primary">₦{{ number_format($r_product->newPrice(), 2) }}</span>
                                                @if ($r_product->hasDiscount())
                                                    <del class="fw-700 opacity-60 ml-1">₦{{ number_format($r_product->price, 2) }}</del> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    
                    <!-- Top Selling Products -->
                    <div class="d-lg-none">
                         <div class="bg-white border mb-4">
                    <div class="p-3 p-sm-4 fs-16 fw-600">
                        Top Selling Products
                    </div>
                    <div class="px-3 px-sm-4 pb-4">
                        <ul class="list-group list-group-flush">
                            @foreach ($top_selling_products as $s_product)
                            @php
                            $s_product = $s_product->product;
                            @endphp
                                <li class="py-3 px-0 list-group-item border-0">
                                    <div class="row gutters-10 align-items-center hov-scale-img hov-shadow-md overflow-hidden has-transition">
                                        <div class="col-xl-4 col-lg-6 col-4">
                                            <!-- Image -->
                                            <a href="/product/{{ str_replace(' ', '_',$s_product->name) }}"
                                                class="d-block text-reset">
                                                <img class="img-fit lazyload h-80px h-md-150px h-lg-80px has-transition"
                                                    src="/assets/img/placeholder.jpg"
                                                    data-src="/{{ $s_product->thumbnail_img }}"
                                                    alt="{{ $product->name }}"
                                                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                            </a>
                                        </div>
                                        <div class="col text-left">
                                            <!-- Product name -->
                                            <div class="d-lg-none d-xl-block mb-3">
                                                <h4 class="fs-14 fw-400 text-truncate-2">
                                                    <a href="/product/{{ str_replace(' ', '_',$s_product->name) }}"
                                                        class="d-block text-reset hov-text-primary">{{ $s_product->name }}</a>
                                                </h4>
                                            </div>
                                            <div class="">
                                                <!-- Price -->
                                                <span class="fs-14 fw-700 text-primary">₦{{ number_format($s_product->newPrice(), 2) }}</span>
                                                <!-- Home Price -->
                                                @if ($s_product->hasDiscount())
                                                    <del class="fs-14 fw-700 opacity-60 ml-1 ml-lg-0 ml-xl-1">₦{{ number_format($s_product->price, 2) }}</del> 
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                    </div>                        
                </div>

                </div>
            </div>
                </div>
</section>

@endsection