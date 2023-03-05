@section('new-arrivals-products')
<section class="mb-4">
    <div class="container">
        <div class="mb-4">
            <h3 class="h3 fw-600 border-bottom">
                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                    New Arrival Products
                </span>
            </h3>
        </div>
        <div class="row gutters-5 row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
            @foreach ($store->products as $product)
                @php
                    $product_name_link = str_replace(' ', '-', $product->name);
                    $product_hero_image = $product->thumbnail_img;
                    $date_range = $product->date_range;
                    $within_range = true;
                    if($date_range) {
                        $dates = explode(' to ', $date_range);
                        $from_date = $dates[0];
                        $to_date = $dates[1];
                        $within_range =  Carbon\Carbon::parse($from_date)->lte(now()) && Carbon\Carbon::parse($to_date)->gte(now());
                    }  
                    $has_discount = $product->discount > 0 && $within_range;
                    if($has_discount) {
                        $perc = $product->discount_type == 'percent' ? $product->discount : ((100 * $product->discount)/$product->price);
                    }
                @endphp
                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                        @if ($has_discount)
                        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $perc }}%</span></span>
                        @endif
                        <div class="position-relative">
                            <a href="/product/{{ $product_name_link }}" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                    src="{{ asset('/assets/img/placeholder.jpg') }}"
                                    data-src="/{{ $product_hero_image }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.onerror=null;this.src='{{ asset('/assets/img/placeholder.jpg') }}';"
                                >
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                {{-- <a href="javascript:void(0)" onclick="addToCompare(154)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="las la-sync"></i>
                                </a> --}}
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <div class="fs-15">
                                @if ($has_discount)
                                @php
                                    $new_price = $product->price - (($perc/100) * $product->price);
                                @endphp
                                    <del class="fw-600 opacity-50 mr-1">₦{{ $product->price }}</del>
                                @else
                                    @php
                                        $new_price = null;
                                    @endphp
                                @endif
                                <span class="fw-700 text-primary">₦{{ $new_price ?? $product->price }}</span>
                            </div>
                            <div class="rating rating-sm mt-1">
                                <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                            </div>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="/product/{{ $product_name_link }}" class="d-block text-reset">{{ $product->name." ".$product->detail }}</a>
                            </h3>
                            {{-- <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                Club Point:
                                <span class="fw-700 float-right">0</span>
                            </div> --}}
                        </div>
                    </div>
                </div>

            @endforeach
            


        </div>
    </div>
</section>
@endsection
@section('new-arrivals-products-temp')
<section class="mb-4">
    <div class="container">
        <div class="mb-4">
            <h3 class="h3 fw-600 border-bottom">
                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                                                New Arrival Products
                                        </span>
            </h3>
        </div>
        <div class="row gutters-5 row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
            <div class="col mb-3">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                    <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;5%</span></span>
                    <div class="position-relative">
                        <a href="https://demo.activeitzone.com/ecommerce/product/FIFA-22-Standard---PC-Online-Game-Code-22545" class="d-block">
                            <img
                                class="img-fit lazyload mx-auto h-140px h-md-210px"
                                src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4gmGnYIZhgatZRJsxrhXVW2qO0aoLLdZT8U6qOQE.png"
                                alt="FIFA 22 Standard - PC [Online Game Code]"
                                onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                            >
                        </a>
                        <div class="absolute-top-right aiz-p-hov-icon">
                            <a href="javascript:void(0)" onclick="addToWishList(154)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                <i class="la la-heart-o"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="addToCompare(154)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                <i class="las la-sync"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="showAddToCartModal(154)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                <i class="las la-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-md-3 p-2 text-left">
                        <div class="fs-15">
                            <del class="fw-600 opacity-50 mr-1">$59.000</del>
                            <span class="fw-700 text-primary">$56.050</span>
                        </div>
                        <div class="rating rating-sm mt-1">
                            <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
                        </div>
                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                            <a href="https://demo.activeitzone.com/ecommerce/product/FIFA-22-Standard---PC-Online-Game-Code-22545" class="d-block text-reset">FIFA 22 Standard - PC [Online Game Code]</a>
                        </h3>
                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                            Club Point:
                            <span class="fw-700 float-right">0</span>
                        </div>
                    </div>
                </div>
            </div>







                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/Adobe-Premiere-Elements-2022--PCMac-Disc-12646" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/mcOpWcFWyJ44tZgPgVZQPiX0aATUX7LEtU9nClSk.png"
            alt="Adobe Premiere Elements 2022 | PC/Mac Disc"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(153)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(153)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(153)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$99.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/Adobe-Premiere-Elements-2022--PCMac-Disc-12646" class="d-block text-reset">Adobe Premiere Elements 2022 | PC/Mac Disc</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">0</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/microsoft-365-personal--12-month-subscription-1-person-premium-office-apps-68431" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/up4HDGFT9Z72NsnLqVGfZB2kNuMGgczTfq6dNIE7.png"
            alt="Microsoft 365 Personal | 12-Month Subscription, 1 person| Premium Office Apps"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(152)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(152)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(152)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$109.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/microsoft-365-personal--12-month-subscription-1-person-premium-office-apps-68431" class="d-block text-reset">Microsoft 365 Personal | 12-Month Subscription, 1 person| Premium Office Apps</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">0</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/auction-product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-ojbwu" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xIT7SLG4ciNvO2z4cU47GhtmS1RDiRBlnbzlYwSu.jpg"
            alt="SUNGAIT Ultra Lightweight"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(142)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(142)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(142)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$25.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/auction-product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-ojbwu" class="d-block text-reset">SUNGAIT Ultra Lightweight</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">125</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;19%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/LfCYkZUyEVnUSjqjznaA6MVuLETNLDkaTMnCud9F.png"
            alt="Under Armour Men&#039;s Charged Assert 9 Running Shoe"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(117)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(117)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(117)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$120.000</del>
                    <span class="fw-700 text-primary">$97.200</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" class="d-block text-reset">Under Armour Men&#039;s Charged Assert 9 Running Shoe</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">75</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-qsdro" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/3ql49de5ukMYrHGMfSyFIDa5QOylkhIQ5Y9buMvL.jpg"
            alt="Nike Men &#039;Mercurial Superfly 7 Elite Firm Ground Football Shoe"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(32)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(32)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(32)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$15.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-qsdro" class="d-block text-reset">Nike Men &#039;Mercurial Superfly 7 Elite Firm Ground Football Shoe</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">75</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/soft-bamboo-boxers-for-men-cool-comfortable-breathable-mens-underwear-boxer-shorts-4i89i" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/CsFoRGNuvhjcSk9fqioXzZoR1LPMyLx4FyW8Jxdg.png"
            alt="Rb3030 Outdoorsman I Aviator Sunglasses"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(31)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(31)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(31)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$95.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/soft-bamboo-boxers-for-men-cool-comfortable-breathable-mens-underwear-boxer-shorts-4i89i" class="d-block text-reset">Rb3030 Outdoorsman I Aviator Sunglasses</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">25</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;32%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/latest-coat-pant-designs-white-wedding-suits-for-men-sq38a" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/NEmbbgNnGnM79GkteGwsFcOSzxlRmNoopmSx6d0Y.png"
            alt="HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(30)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(30)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(30)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$35.000</del>
                    <span class="fw-700 text-primary">$23.800</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/latest-coat-pant-designs-white-wedding-suits-for-men-sq38a" class="d-block text-reset">HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">175</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/Lee-Mens-Slim-Straight-Jean-wUDEU" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/2N2EGQFYy8D5nt5YmNnsL3whVFmGqz5pxfEqjoNO.jpg"
            alt="Lee Men&#039;s Slim Straight Jean"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(29)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(29)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(29)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$55.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/Lee-Mens-Slim-Straight-Jean-wUDEU" class="d-block text-reset">Lee Men&#039;s Slim Straight Jean</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">275</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/casual-garb-mens-snow-heather-fitted-t-shirt-short-sleeve-crew-neck-t-shirts-for-men-pxcim" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/rUTG4Rv0VNuGd63S1WHgVmvVzZE0mFfr8n7hvQDz.jpg"
            alt="Casual Garb Men&#039;s Snow Heather Fitted T Shirt Short Sleeve Crew Neck T-Shirts for Men"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(28)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(28)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(28)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$25.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/casual-garb-mens-snow-heather-fitted-t-shirt-short-sleeve-crew-neck-t-shirts-for-men-pxcim" class="d-block text-reset">Casual Garb Men&#039;s Snow Heather Fitted T Shirt Short Sleeve Crew Neck T-Shirts for Men</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">125</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;44%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xIT7SLG4ciNvO2z4cU47GhtmS1RDiRBlnbzlYwSu.jpg"
            alt="SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(27)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(27)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(27)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$25.000</del>
                    <span class="fw-700 text-primary">$14.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" class="d-block text-reset">SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">125</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/polar-mens-waterproof-outsole-deep-tread-fully-faux-fur-lined-winter-durable-snow-boots-8kcm2" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/5nCNVceSPSm0HLIvHp0cViVOjAUUrQtwXCVz67sN.jpg"
            alt="POLAR Mens Waterproof Outsole Deep Tread Fully Faux Fur Lined Winter Durable Snow Boots"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(26)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(26)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(26)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$113.300</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/polar-mens-waterproof-outsole-deep-tread-fully-faux-fur-lined-winter-durable-snow-boots-8kcm2" class="d-block text-reset">POLAR Mens Waterproof Outsole Deep Tread Fully Faux Fur Lined Winter Durable Snow Boots</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">550</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/timberland-mens-classic-leather-jean-belt-93uoq" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/sTmRZfx1Pk4zQAfQxigk5kFyFnINoSZXtsNEl2ws.jpg"
            alt="Timberland Men&#039;s Classic Leather Jean Belt"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(25)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(25)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(25)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$25.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/timberland-mens-classic-leather-jean-belt-93uoq" class="d-block text-reset">Timberland Men&#039;s Classic Leather Jean Belt</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">125</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;10%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/Rain-Coats-for-Adults-Rain-Ponchos-with-Hoods-Man-rhSJD" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/BwKWrlcrrJGwaug9u2Csgjp61fL5jQ7zVmuU1qqy.jpg"
            alt="Rain Coats for Adults Rain Ponchos with Hoods Man"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(24)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(24)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(24)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$50.000</del>
                    <span class="fw-700 text-primary">$45.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/Rain-Coats-for-Adults-Rain-Ponchos-with-Hoods-Man-rhSJD" class="d-block text-reset">Rain Coats for Adults Rain Ponchos with Hoods Man</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">250</span>
        </div>
        </div>
</div>
                </div>
                                <div class="col mb-3">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/jacket-blue-plain-washington-flcm7" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/bpqvwImDoMlSleFywG1kOcGrvImmQQJRULI3clnR.jpg"
            alt="Calvin Klein Men&#039;s Slim Fit Suit Separates"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(23)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(23)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(23)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$60.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/jacket-blue-plain-washington-flcm7" class="d-block text-reset">Calvin Klein Men&#039;s Slim Fit Suit Separates</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">300</span>
        </div>
        </div>
</div>
                </div>
                        </div>
        <div class="aiz-pagination aiz-pagination-center mb-4">
            
        </div>
    </div>
</section>
@endsection