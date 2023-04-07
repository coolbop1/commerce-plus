@section('flash-sales')
<section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Flash Sale</span>
                </h3>
                {{-- <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="2025/01/01 00:00:00"></div> --}}
                <a href="/flash-deal/falsh-sale" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">View More</a>
            </div>

            @php
                $wishlist = $user ? $user->wishList->pluck('id')->toArray() : [];
            @endphp
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                @foreach ($flash_sales as $product)
                    <div class="carousel-box">
                        <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                            @php
                                $perc = $product->discount_type == 'percent' ? $product->discount : ((100 * $product->discount)/$product->price);
                            @endphp
                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $perc }}%</span></span>
                            <div class="position-relative">
                                <a href="/product/{{ $product->slug }}" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                    src="/assets/img/placeholder.jpg"
                                    data-src="/{{ $product->thumbnail_img }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"
                                >
                                </a>
                                <div class="absolute-top-right aiz-p-hov-icon">
                                    <a href="javascript:void(0)" onclick="addToWishListV2({{ $product->id }})" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                        <i class="la la-heart-o {{ in_array($product->id, $wishlist) ? 'active' : '' }}"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-value="{{ str_replace(`"`, `'`, json_encode($product)) }}" onclick="addToCart({{ $product->id }}, this, 'online' )" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                        <i class="las la-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="p-md-3 p-2 text-left">
                                <div class="fs-15">
                                    <del class="fw-600 opacity-50 mr-1">₦{{ number_format($product->price, 2) }}</del>
                                    <span class="fw-700 text-primary">₦{{ number_format($product->newPrice(), 2) }}</span>
                                </div>
                                <div class="rating rating-sm mt-1">
                                    <i class = 'las la-star {{ $product->rating() >= 1 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 2 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 3 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 4 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 5 ? 'active' : '' }}'></i>
                                </div>
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                    <a href="/product/{{ $product->slug }}" class="d-block text-reset">{{ $product->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
                

            </div>

        </div>
    </div>
</section>

@endsection
















@section('flash-sales-old')
<section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

            <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Flash Sale</span>
                </h3>
                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="2025/01/01 00:00:00"></div>
                <a href="https://demo.activeitzone.com/ecommerce/flash-deal/falsh-sale-k7qpu" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">View More</a>
            </div>

            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                                                                                            <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/calvin-klein-womens-scuba-sleeveless-princess-seamed-sheath-dress-mnluo" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1TUKIDcKS3huliwtIrAUbILoQEXrDanjLPBV1lbO.png"
            alt="Calvin Klein Women&#039;s Scuba Sleeveless Princess Seamed Sheath Dress"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
                <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
            Wholesale
        </span>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(2)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(2)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(2)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$150.000</del>
                    <span class="fw-700 text-primary">$120.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/calvin-klein-womens-scuba-sleeveless-princess-seamed-sheath-dress-mnluo" class="d-block text-reset">Calvin Klein Women&#039;s Scuba Sleeveless Princess Seamed Sheath Dress</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">750</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/adiba-womens-regular-fit-joggers-tbg6s" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/mSeg8CuFFKByBwZWAFi0JTpREOY6cTL3JT5VFixe.png"
            alt="Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(3)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(3)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(3)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$90.000</del>
                    <span class="fw-700 text-primary">$72.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/adiba-womens-regular-fit-joggers-tbg6s" class="d-block text-reset">Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">450</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/adidas-womens-cotton-jogger-set-ihfxn" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/vAPrbsvyoO5T8qovvyYsZy7m5bud6yaRqvruRtWz.png"
            alt="Adidas Women&#039;s Parma 16 Shorts"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(103)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(103)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(103)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$40.000</del>
                    <span class="fw-700 text-primary">$32.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/adidas-womens-cotton-jogger-set-ihfxn" class="d-block text-reset">Adidas Women&#039;s Parma 16 Shorts</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">200</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/adidas-team-force-deodorant-body-spray-for-men-hof1s" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/6odxCPH4flWtKqVBkODMf1nt2AOJ6aoTMDDm96yo.png"
            alt="Adidas Team Force Deodorant Body Spray For Men"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
                <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
            Wholesale
        </span>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(104)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(104)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(104)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                    <span class="fw-700 text-primary">$40.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/adidas-team-force-deodorant-body-spray-for-men-hof1s" class="d-block text-reset">Adidas Team Force Deodorant Body Spray For Men</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">100</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/adidas-mens-running-shoes-vfooz" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/DPaU1Z5wc7Xb89jXwI85Nv4ve5d4Gt5FmyxszFfK.png"
            alt="Men&#039;s Running Shoes Non Slip Athletic Tennis Walking Blade Type Sneakers"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(105)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(105)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(105)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$95.000</del>
                    <span class="fw-700 text-primary">$76.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/adidas-mens-running-shoes-vfooz" class="d-block text-reset">Men&#039;s Running Shoes Non Slip Athletic Tennis Walking Blade Type Sneakers</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">250</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/motherhood-maternity-womens-maternity-lace-trim-nursing-nightgown-90jva" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/cHqJ2cgvbR6jD5UNVHrhNhsjCXL60fiVuT0KhBte.png"
            alt="Ever-Pretty Women&#039;s Applique Chiffon Long Sleeve Maxi Formal Evening Party Dress"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(111)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(111)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(111)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$100.000</del>
                    <span class="fw-700 text-primary">$80.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/motherhood-maternity-womens-maternity-lace-trim-nursing-nightgown-90jva" class="d-block text-reset">Ever-Pretty Women&#039;s Applique Chiffon Long Sleeve Maxi Formal Evening Party Dress</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">500</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/bearsland-maternity-womens-3-pieces-soft-nursing-pajamas-set-postpartum-sleepwear-for-breastfeeding-vsqcz" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xgkm8TcXVQTwQEGFyJcwTj3yJLKOlnACY5wXLWYx.png"
            alt="Self Design, Embellished, Embroidered Satin Blend, Net Semi Stitched Flared/A-line Gown"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(112)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(112)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(112)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$120.000</del>
                    <span class="fw-700 text-primary">$96.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/bearsland-maternity-womens-3-pieces-soft-nursing-pajamas-set-postpartum-sleepwear-for-breastfeeding-vsqcz" class="d-block text-reset">Self Design, Embellished, Embroidered Satin Blend, Net Semi Stitched Flared/A-line Gown</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">600</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/women-fit-and-flare-dress-rqrit" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ySXcvCWaNuO4J4ai3t8XhzXP7dINxkfnXOGyH1nY.png"
            alt="Women Fit and Flare Dress"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(122)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(122)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(122)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$45.900</del>
                    <span class="fw-700 text-primary">$36.720</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/women-fit-and-flare-dress-rqrit" class="d-block text-reset">Women Fit and Flare Dress</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">225</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/men-slim-fit-checkered-spread-collar-casual-shirt-r78zi" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/fBfyYJCjd4gBekp6ymy83jxaEoqlD8OH8nQ2QYNH.png"
            alt="Men Slim Fit Checkered Spread Collar Casual Shirt"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(123)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(123)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(123)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$50.000</del>
                    <span class="fw-700 text-primary">$40.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/men-slim-fit-checkered-spread-collar-casual-shirt-r78zi" class="d-block text-reset">Men Slim Fit Checkered Spread Collar Casual Shirt</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">250</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/animal-print-boys-track-suit-mg9py" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/olt1GFKkEYLa6GIyXkx50HZQTOVOLOIw1ubDvsjb.png"
            alt="Animal Print Boys Track Suit"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(124)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(124)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(124)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$52.000</del>
                    <span class="fw-700 text-primary">$41.600</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/animal-print-boys-track-suit-mg9py" class="d-block text-reset">Animal Print Boys Track Suit</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">260</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/sassie-basic-31-ltr-navy-backpack-waterproof-school-bag-qy5vj" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ROf6zU5b3j6foJplk6zOa5WmQ5ZjhZjruDdxQT43.png"
            alt="Adidas Unisex Santiago Insulated Lunch Bag, Signal Pink"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(125)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(125)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(125)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$65.000</del>
                    <span class="fw-700 text-primary">$52.000</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/sassie-basic-31-ltr-navy-backpack-waterproof-school-bag-qy5vj" class="d-block text-reset">Adidas Unisex Santiago Insulated Lunch Bag, Signal Pink</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">325</span>
        </div>
        </div>
</div>
                        </div>
                                                                                                                    <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
        <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;20%</span></span>
    <div class="position-relative">
            <a href="https://demo.activeitzone.com/ecommerce/product/airpods-max-hjeer" class="d-block">
        <img
            class="img-fit lazyload mx-auto h-140px h-md-210px"
            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/jHzVW1HMZwmQCDMg8QHFMbhjpmkkULoAvygciL2c.png"
            alt="Apple iPhone 13 Pro Max (128 GB, Alpine Green)"
            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
        >
    </a>
            <div class="absolute-top-right aiz-p-hov-icon">
        <a href="javascript:void(0)" onclick="addToWishList(126)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
            <i class="la la-heart-o"></i>
        </a>
        <a href="javascript:void(0)" onclick="addToCompare(126)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
            <i class="las la-sync"></i>
        </a>
        <a href="javascript:void(0)" onclick="showAddToCartModal(126)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
            <i class="las la-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="p-md-3 p-2 text-left">
    <div class="fs-15">
                        <del class="fw-600 opacity-50 mr-1">$699.000</del>
                    <span class="fw-700 text-primary">$559.200</span>
    </div>
    <div class="rating rating-sm mt-1">
        <i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
    </div>
    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
        <a href="https://demo.activeitzone.com/ecommerce/product/airpods-max-hjeer" class="d-block text-reset">Apple iPhone 13 Pro Max (128 GB, Alpine Green)</a>
    </h3>
                <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
            Club Point:
            <span class="fw-700 float-right">2750</span>
        </div>
        </div>
</div>
                        </div>
                                                        </div>
        </div>
    </div>
</section>
@endsection