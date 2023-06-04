@section('new-products')
<div id="section_newest">
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                            New Products
                        </span>
                    </h3>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($productsByStore as $products)
                        @foreach ($products->take(2) as $product)
                            <div class="carousel-box">
                                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
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
                                            <i class="la la-heart-o"></i>
                                            </a>
                                            {{-- <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="Add to cart" data-placement="left"> --}}
                                            <a 
                                            {{-- data-value="{{ str_replace('"', "'", json_encode($product)) }}"  --}}
                                            href="javascript:void(0)" 
                                            {{-- onclick="addToCart({{ $product->id }}, this, type = 'online')"  --}}
                                            onclick="addToCartV2({{ $product->id }})"
                                            data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2 text-left">
                                        <div class="fs-15">
                                            @if ($product->hasDiscount())
                                            <del class="fw-600 opacity-50 mr-1">{{ $product->price }}</del>
                                            @endif
                                            <span class="fw-700 text-primary">₦{{ $product->newPrice() }}</span>
                                        </div>
                                        <div class="rating rating-sm mt-1">
                                            <i class = 'las la-star {{ $product->rating() >= 1 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 2 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 3 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 4 ? 'active' : '' }}'></i><i class = 'las la-star {{ $product->rating() >= 5 ? 'active' : '' }}'></i>
                                        </div>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                            <a href="/product/{{ $product->slug }}" class="d-block text-reset">{{ $product->name }}</a>
                                        </h3>
                                            {{-- <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                        Club Point:
                                        <span class="fw-700 float-right">0</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                            
                    @endforeach
                    
                </div>



            </div>
        </div>
    </section>
</div>
@endsection




@section('new-products-old')
<div id="section_newest">
    <section class="mb-4">
<div class="container">
    <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
        <div class="d-flex mb-3 align-items-baseline border-bottom">
            <h3 class="h5 fw-700 mb-0">
                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                    New Products
                </span>
            </h3>
        </div>
        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/apple-iphone-14-pro-128gb-512gb-deep-purple-unlocked" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/IaqgwBAe6tTXCfDwHIRham8S5rFXLC77elMybtZC.webp"
alt="Apple iPhone 14 Pro , 128GB, 512GB, Deep Purple- Unlocked"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(161)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(161)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(161)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
        <span class="fw-700 text-primary">$999.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/apple-iphone-14-pro-128gb-512gb-deep-purple-unlocked" class="d-block text-reset">Apple iPhone 14 Pro , 128GB, 512GB, Deep Purple- Unlocked</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/corsair-k60-rgb-pro-mechanical-gaming-keyboard-cherry-mechanical-keyswitches-durable-aluminumframe-customizable-per-key-rgb-backlighting-black0" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4Z36GtOGZRtanoh6PrbPCWba0MuPUoAfIoEdgjr9.png"
alt="Corsair K60 RGB Pro Mechanical Gaming Keyboard - CHERRY Mechanical Keyswitches - Durable AluminumFrame - Customizable Per-Key RGB Backlighting, Black"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(160)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(160)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(160)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
        <span class="fw-700 text-primary">$51.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/corsair-k60-rgb-pro-mechanical-gaming-keyboard-cherry-mechanical-keyswitches-durable-aluminumframe-customizable-per-key-rgb-backlighting-black0" class="d-block text-reset">Corsair K60 RGB Pro Mechanical Gaming Keyboard - CHERRY Mechanical Keyswitches - Durable AluminumFrame - Customizable Per-Key RGB Backlighting, Black</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">10</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
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
                                        <div class="carousel-box">
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
                                        <div class="carousel-box">
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
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;25%</span></span>
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/analog-black-dial-mens-watch-32-bk-ck" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1quPYqHJkqT3QypO7fg78wEspoNktv69QWNbAvdP.png"
alt="Fossil Men&#039;s Grant Stainless Steel Quartz Chronograph Watch"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(132)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(132)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(132)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
            <del class="fw-600 opacity-50 mr-1">$600.000</del>
        <span class="fw-700 text-primary">$450.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/analog-black-dial-mens-watch-32-bk-ck" class="d-block text-reset">Fossil Men&#039;s Grant Stainless Steel Quartz Chronograph Watch</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/baby-girls-cotton-dress-cardigan-and-shoe-set" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/2RF080PPtVaUyETTD5MNxxxzfG2QwvAsAfsOExOD.png"
alt="Gerber Unisex-Baby Onesies Bodysuit Multi Pack"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
    <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
Wholesale
</span>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(131)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(131)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(131)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
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
<a href="https://demo.activeitzone.com/ecommerce/product/baby-girls-cotton-dress-cardigan-and-shoe-set" class="d-block text-reset">Gerber Unisex-Baby Onesies Bodysuit Multi Pack</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/mens-one-and-only-textured-short-sleeve-button-up-qmn5g" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/n0tG2QX1dPsDePj1b4pFbm4JQpfwx7NLWoCvHNgm.png"
alt="Gildan Men&#039;s Crew T-Shirts, Multipack"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
    <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
Wholesale
</span>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(130)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(130)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(130)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
        <span class="fw-700 text-primary">$30.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/mens-one-and-only-textured-short-sleeve-button-up-qmn5g" class="d-block text-reset">Gildan Men&#039;s Crew T-Shirts, Multipack</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;30%</span></span>
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/gopune-mens-athletic-tracksuit-full-zip-warm-jogging-sweat-suits-mrcnp" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/kPXokXNCgX8TcdsX01h9T4Xxt617kU7JiYkfSj4P.png"
alt="Hgvoetty Unisex 3D Print Shirts Colorful Space Graphic Tees for Men Women Teens"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(129)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(129)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(129)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
            <del class="fw-600 opacity-50 mr-1">$50.000</del>
        <span class="fw-700 text-primary">$35.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/gopune-mens-athletic-tracksuit-full-zip-warm-jogging-sweat-suits-mrcnp" class="d-block text-reset">Hgvoetty Unisex 3D Print Shirts Colorful Space Graphic Tees for Men Women Teens</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;40%</span></span>
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/udalyn-rhinestone-bridesmaid-jewelry-sets-for-women-7i3tx" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/OAyteCbfJATwBhgXFIVJXZer1nMApjWSRxuvsuxo.png"
alt="Gillette Sensor3 Comfort Disposable Razors for Men, 12 Count, Water-Activated Comfortgel Technology"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
    <span class="absolute-bottom-left fs-11 text-white fw-600 px-2 lh-1-8" style="background-color: #455a64">
Wholesale
</span>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(128)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(128)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(128)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
            <del class="fw-600 opacity-50 mr-1">$25.000</del>
        <span class="fw-700 text-primary">$15.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i><i class = 'las la-star active'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/udalyn-rhinestone-bridesmaid-jewelry-sets-for-women-7i3tx" class="d-block text-reset">Gillette Sensor3 Comfort Disposable Razors for Men, 12 Count, Water-Activated Comfortgel Technology</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
</div>
</div>
</div>
            </div>
                                        <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
<div class="position-relative">
<a href="https://demo.activeitzone.com/ecommerce/product/mens-machine-stainless-steel-quartz-chronograph-watch-2gns4" class="d-block">
<img
class="img-fit lazyload mx-auto h-140px h-md-210px"
src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/wTxJIHeuG9rlxXSwp1yTS8ptdSwYpOzMrhH5yvf1.jpg"
alt="Men&#039;s Machine Stainless Steel Quartz Chronograph Watch"
onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
>
</a>
<div class="absolute-top-right aiz-p-hov-icon">
<a href="javascript:void(0)" onclick="addToWishList(127)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
<i class="la la-heart-o"></i>
</a>
<a href="javascript:void(0)" onclick="addToCompare(127)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
<i class="las la-sync"></i>
</a>
<a href="javascript:void(0)" onclick="showAddToCartModal(127)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
<i class="las la-shopping-cart"></i>
</a>
</div>
</div>
<div class="p-md-3 p-2 text-left">
<div class="fs-15">
        <span class="fw-700 text-primary">$190.000</span>
</div>
<div class="rating rating-sm mt-1">
<i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i><i class = 'las la-star'></i>
</div>
<h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
<a href="https://demo.activeitzone.com/ecommerce/product/mens-machine-stainless-steel-quartz-chronograph-watch-2gns4" class="d-block text-reset">Men&#039;s Machine Stainless Steel Quartz Chronograph Watch</a>
</h3>
    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
Club Point:
<span class="fw-700 float-right">0</span>
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
</div>
@endsection