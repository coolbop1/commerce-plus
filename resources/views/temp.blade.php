@section('body')
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div id="order-details-modal-body">

            </div>
        </div>
    </div>
</div>


            
    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-lg-3 position-static d-none d-lg-block">
                    <div class="aiz-category-menu bg-white rounded  shadow-sm" >
                        <div class="p-3 bg-soft-primary d-none d-lg-block rounded-top all-category position-relative text-left">
                            <span class="fw-600 fs-16 mr-3">Categories</span>
                            <a href="https://demo.activeitzone.com/ecommerce/categories" class="text-reset">
                                <span class="d-none d-lg-inline-block">See All ></span>
                            </a>
                        </div>
                        <ul class="list-unstyled categories no-scrollbar py-2 mb-0 text-left">
                            @foreach ($categories as $key => $category)
                                @php
                                    $list_number = $key + 1;
                                    $categoryName = $category->name;
                                    $name_string = str_replace(' ', '_',$categoryName);
                                @endphp
                                <li class="category-nav-element" data-id="{{ $list_number }}">
                                    <a href="category/{{  $categoryName }}" class="text-truncate text-reset py-2 px-3 d-block">
                                        <img
                                            class="cat-image lazyload mr-2 opacity-60"
                                            src="uploads/{{ $name_string }}.jpeg"
                                            data-src="uploads/{{ $name_string }}.jpeg"
                                            width="16"
                                            alt="{{ $categoryName }}"
                                            onerror="this.onerror=null;this.src='uploads/{{ $name_string }}.jpeg';"
                                        >
                                        <span class="cat-name">{{ $categoryName }}</span>
                                    </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                                        <div class="c-preloader text-center absolute-center">
                                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                                        </div>
                                    </div>
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                </div>





















                
                <div class=" col-lg-7 ">
                                            <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                                                                                        <div class="carousel-box">
                                    <a href="https://codecanyon.net/item/active-ecommerce-cms/23471405?s_rank=23">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="https://demo.activeitzone.com/ecommerce/public/uploads/all/faEi771HIT7B9yPye5YqXip8EBMXa4VQBLhksq2g.png"
                                            alt="Active eCommerce CMS promo"
                                                                                        height="315"
                                                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                    </a>
                                </div>
                                                            <div class="carousel-box">
                                    <a href="https://codecanyon.net/item/active-ecommerce-cms/23471405?s_rank=23">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="https://demo.activeitzone.com/ecommerce/public/uploads/all/0Bf6AZrON13NRpLxc7S6bua38uRBUuiwCH7fN3LG.png"
                                            alt="Active eCommerce CMS promo"
                                                                                        height="315"
                                                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                    </a>
                                </div>
                                                            <div class="carousel-box">
                                    <a href="https://codecanyon.net/item/active-ecommerce-cms/23471405?s_rank=23">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="https://demo.activeitzone.com/ecommerce/public/uploads/all/HordtzBXzs1JUTTFpRyGLPYO26Z9J4IVt3jLeOsM.png"
                                            alt="Active eCommerce CMS promo"
                                                                                        height="315"
                                                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                    </a>
                                </div>
                                                            <div class="carousel-box">
                                    <a href="https://codecanyon.net/item/active-ecommerce-cms/23471405?s_rank=23">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="https://demo.activeitzone.com/ecommerce/public/uploads/all/D336pBP0YKEHoa4NWUFCh1blXcGsYlTIjvdFnaGm.png"
                                            alt="Active eCommerce CMS promo"
                                                                                        height="315"
                                                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                    </a>
                                </div>
                                                    </div>
                                                                <ul class="list-unstyled mb-0 row gutters-5">
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/women-clothing-fashion" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1MUCmFKsjx73ETkmjx2DYGo3XgKPBDpr36r1b4OY.png"
                                            alt="Women Clothing &amp; Fashion"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Women Clothing &amp; Fashion</div>
                                    </a>
                                </li>
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/mobile-phones" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/JRAqGXo7vQD0rgAPzJnyFVjWJN4VlGR4eQTNkUKP.png"
                                            alt="Mobile Phones"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Mobile Phones</div>
                                    </a>
                                </li>
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/women-dress-04vbn" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xg4lbDBbbIKJeZGE1xkn3k0g3PVeprNNHmezOwhd.png"
                                            alt="Baby Dresses"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Baby Dresses</div>
                                    </a>
                                </li>
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/men-formal-dress-0odnx" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/lS4LNtTDlbBoEpwsxIieqVTd0WUiUGkj54SuKkPl.png"
                                            alt="Men Formal Dress"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Men Formal Dress</div>
                                    </a>
                                </li>
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/doll-niia5" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/YxqVTyAxbqDphgEHg8pSBiQ7Z6RVAZgrMMRKp4iX.png"
                                            alt="Kids &amp; Toy"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Kids &amp; Toy</div>
                                    </a>
                                </li>
                                                            <li class="minw-0 col-4 col-md mt-3">
                                    <a href="https://demo.activeitzone.com/ecommerce/category/tools-vgs3d" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                            data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/0xydX0EqPmMjchMD9wc337vlHbZk9BQLIPlfisEp.png"
                                            alt="Tools"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Tools</div>
                                    </a>
                                </li>
                                                    </ul>
                                    </div>

                                <div class="col-lg-2 order-3 mt-3 mt-lg-0">
                    <div class="bg-white rounded shadow-sm">
                        <div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
                            <span class="fw-600 fs-16 mr-2 text-truncate">
                                Todays Deal
                            </span>
                            <span class="badge badge-primary badge-inline">Hot</span>
                        </div>
                        <div class="c-scrollbar-light overflow-auto h-lg-400px p-2 bg-primary rounded-bottom">
                            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/Philips-Rice-Cooker-06L-4BWjg" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/5DpZmEosn1JKGBEv7LnmKaY2z3oN9TIlj6zSgSCs.jpg"
                                                        alt="Philips Rice Cooker 0.6L"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$64.750</span>
                                                                                                            <del class="d-block opacity-70">$68.000</del>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/adidas-mens-originals-poly-tape-shorts-en9ka" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/u1DDNkgW9HCKqNHOYURJY6dJaqwiSwBBQj8S0jLH.png"
                                                        alt="Adidas Men&#039;s Originals Poly Tape Shorts"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$102.000</span>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/adidas-womens-cropped-slim-polyester-shorts-jvdi7" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/8LmfSZEGCktshcYjefNylyAHRdFwPqkKz7hwVG9R.png"
                                                        alt="Nautica Voyage By Nautica For Men Eau De Toilette Spray"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$65.000</span>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/LfCYkZUyEVnUSjqjznaA6MVuLETNLDkaTMnCud9F.png"
                                                        alt="Under Armour Men&#039;s Charged Assert 9 Running Shoe"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$97.200</span>
                                                                                                            <del class="d-block opacity-70">$120.000</del>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/FIFA-22-Standard---PC-Online-Game-Code-22545" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4gmGnYIZhgatZRJsxrhXVW2qO0aoLLdZT8U6qOQE.png"
                                                        alt="FIFA 22 Standard - PC [Online Game Code]"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$56.050</span>
                                                                                                            <del class="d-block opacity-70">$59.000</del>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                                                            <div class="col mb-2">
                                    <a href="https://demo.activeitzone.com/ecommerce/product/apple-iphone-14-pro-128gb-512gb-deep-purple-unlocked" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/IaqgwBAe6tTXCfDwHIRham8S5rFXLC77elMybtZC.webp"
                                                        alt="Apple iPhone 14 Pro , 128GB, 512GB, Deep Purple- Unlocked"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$999.000</span>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                                                                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

























    
        <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ftvjCr0dQVT8NRMN9CfRF59Lft5EowYR0jK9ErOD.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/0tTAxWgBlgFePPIsVPr0mVsZZ1Ri5Fx5eFBshiqQ.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/r3RsqaoHCK1hdSDx6atacmch35DA0tAOb6NvFeiy.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                            </div>
        </div>
    </div>
    

    
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

    
    <div id="section_featured">

    </div>

    
    <div id="section_best_selling">

    </div>

    <!-- Auction Product -->
            <div id="auction_products">

        </div>
    


    
        <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/blog" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/pd8obnWJJlk4IomqDXV12MrnHTMRYJayCoGc6KBy.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/blog" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/hAxSFAEl2aa3p2aEiZmEWOUAZWxCQ5k0CKt7rjxn.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/blog" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xPUoV4MFG1ld4uIeB95YblBgdvwfo3qSCn5V8PBo.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                            </div>
        </div>
    </div>
    
    
    <div id="section_home_categories">

    </div>

    
                                      <section class="mb-4">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Classified Ads</span>
                                </h3>
                                <a href="https://demo.activeitzone.com/ecommerce/customer-products" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View More</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/canon-eos-1500drebel-t7-dslr-camera-with-ef-s-18-55-mm-f35-56-is-ii-lens-rkdnw" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4IsovvLOBxuVdT03mApxSCkfBH5L1oZlT7vqjdqG.jpg"
                                                        alt="Canon EOS 1500D/Rebel T7 DSLR Camera with EF-S 18-55 mm f/3.5-5.6 is II Lens"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-success">new</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$52.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/canon-eos-1500drebel-t7-dslr-camera-with-ef-s-18-55-mm-f35-56-is-ii-lens-rkdnw" class="d-block text-reset">Canon EOS 1500D/Rebel T7 DSLR Camera with EF-S 18-55 mm f/3.5-5.6 is II Lens</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/sony-bravia-108-cm-43-inches-full-hd-smart-led-tv-kdl-ok3mt" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/Aq1pAApsDQllVJMQWi4foGvqAbRBBOUbaau0lSIT.jpg"
                                                        alt="Sony Bravia 108 cm (43 inches) Full HD Smart LED TV KDL"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-danger">Used</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$320.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/sony-bravia-108-cm-43-inches-full-hd-smart-led-tv-kdl-ok3mt" class="d-block text-reset">Sony Bravia 108 cm (43 inches) Full HD Smart LED TV KDL</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/sony-ht-s20r-51ch-dolby-digital-soundbar-sv3n9" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/TYCNMostlk3vy1hXMaM08kzqoDSL4r7ijByFu6xq.jpg"
                                                        alt="Sony HT-S20R 5.1ch Dolby Digital Soundbar"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-success">new</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$90.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/sony-ht-s20r-51ch-dolby-digital-soundbar-sv3n9" class="d-block text-reset">Sony HT-S20R 5.1ch Dolby Digital Soundbar</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/mi-smart-router-4c-300-mbps-with-4-high-performance-antenna--app-control-wy3kx" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/WxdyhMANvTFIWWLyKvaxYoeabBILYXUlZOBj4I6N.jpg"
                                                        alt="Mi Smart Router 4C, 300 Mbps with 4 high-Performance Antenna &amp; App Control"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-success">new</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$30.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/mi-smart-router-4c-300-mbps-with-4-high-performance-antenna--app-control-wy3kx" class="d-block text-reset">Mi Smart Router 4C, 300 Mbps with 4 high-Performance Antenna &amp; App Control</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/canon-pixma-ts3320-black-works-with-alexa-87ole" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/7eLAP9Fx3RyoDU2imFEW1B0kasAmCvIagFbH9HCJ.jpg"
                                                        alt="Canon Pixma TS3320 Black, Works with Alexa"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-danger">Used</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$80.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/canon-pixma-ts3320-black-works-with-alexa-87ole" class="d-block text-reset">Canon Pixma TS3320 Black, Works with Alexa</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                                  <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="https://demo.activeitzone.com/ecommerce/customer-product/apple-watch-series-6-gps-40mm---gold-aluminum-case-with-pink-sand-sport-band-2rgs4" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/JwCa8yU6rKPyhVFeTVFGqG2F8P6kzYs85ohQGFfe.jpg"
                                                        alt="Apple Watch Series 6 (GPS, 40mm) - Gold Aluminum Case with Pink Sand Sport Band"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                                                                           <span class="badge badge-inline badge-danger">Used</span>
                                                                                                    </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">$120.000</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="https://demo.activeitzone.com/ecommerce/customer-product/apple-watch-series-6-gps-40mm---gold-aluminum-case-with-pink-sand-sport-band-2rgs4" class="d-block text-reset">Apple Watch Series 6 (GPS, 40mm) - Gold Aluminum Case with Pink Sand Sport Band</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                                                          </div>
                       </div>
                   </div>
               </section>
                  
    
        <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/X4hJOrT209ZqqGIr4TSitU30cIjbxNRD1du4XTIR.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/jsFxrAwQdU5YZ8P98BbW8Ec4BgebBBkKaDtogKm1.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="d-block text-reset">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/oxv93ppI31VAVmCnQBfb8in0TDipFr2nFIZ1ZWQO.png" alt="Active eCommerce CMS promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                            </div>
        </div>
    </div>
    
    
    <div id="section_best_sellers">

    </div>

    
            <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Top 10 Categories</span>
                            </h3>
                            <a href="https://demo.activeitzone.com/ecommerce/categories" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View All Categories</a>
                        </div>
                        <div class="row gutters-5">
                                                                                                                                                            <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/women-clothing-fashion" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/1MUCmFKsjx73ETkmjx2DYGo3XgKPBDpr36r1b4OY.png"
                                                        alt="Women Clothing &amp; Fashion"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Women Clothing &amp; Fashion</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/men-clothing-fashion" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/qxx8KCh8uoOSn7Wy7JzxtBfo8bbdf4wqrb6cjrYZ.png"
                                                        alt="Men Clothing &amp; Fashion"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Men Clothing &amp; Fashion</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/computer-accessories" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/kggyYPLteKYpwymsxflG68TOLT18djwpEoFRx0xq.png"
                                                        alt="Computer &amp; Accessories"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Computer &amp; Accessories</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/automobile-motorcycle" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ciBHoE677NlbMD3jN3ibYfiJz1nXDGbXZLpkvQRr.png"
                                                        alt="Automobile &amp; Motorcycle"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Automobile &amp; Motorcycle</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/kids-toy" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/cwLfZYV4OBNagRx7ETdPxh2Rdo0FaZL5wHlPYmi9.jpg"
                                                        alt="Kids &amp; toy"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Kids &amp; toy</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/sports-outdoor" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/rvA1MgGzrBFDohIjv19t4hTiDcLis99zh9zxUFrN.png"
                                                        alt="Sports &amp; outdoor"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Sports &amp; outdoor</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/jewelry-watches" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4OsOdBNmx3j7zkunfrx2T5y38edrxfB9Bs2iaIp0.png"
                                                        alt="Jewelry &amp; Watches"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Jewelry &amp; Watches</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/beauty-health-hair" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/7Ker3AJrYWjbCfVT5CeUt5MQEvbzztu81y5CpPx9.png"
                                                        alt="Beauty, Health &amp; Hair"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Beauty, Health &amp; Hair</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/home-improvement-tools" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/c7uAn2sX6ZG885zZqi8RmeZRS2KlbQ1lttLKAqon.png"
                                                        alt="Home Improvement &amp; Tools"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Home Improvement &amp; Tools</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/category/home-decoration-appliance" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/46XdBnZyeRdRNwi8yae6o1rECCZxAi7XnDe7PmN6.png"
                                                        alt="Home decoration &amp; Appliance"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Home decoration &amp; Appliance</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                    </div>
                    </div>
                                                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Top 10 Brands</span>
                            </h3>
                            <a href="https://demo.activeitzone.com/ecommerce/brands" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View All Brands</a>
                        </div>
                        <div class="row gutters-5">
                                                                                                                                                            <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/ford" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/CVo1G2QVpVtSoZlmCvC0l4hL9WIiWLlTQf6XclMC.jpg"
                                                        alt="Ford"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Ford</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/chevrolet" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ecb0DAeSHXtbC4Fn6WYz8MBpJuqVeJweFHpO5Tdv.jpg"
                                                        alt="Chevrolet"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Chevrolet</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/audi" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/SE5RmXlnnn7IGCueKcCC3bSb6VMbpRKCQ9Uj73im.jpg"
                                                        alt="Audi"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Audi</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/hyundai" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/psvYUjmOREXrnLNH4O3h9pC3btmXDsyh96vSPEtk.jpg"
                                                        alt="Hyundai"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Hyundai</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/nissan" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/igAkXQNWqVIiTSwKVsoG9DmihosVVTL6vp94K6qf.jpg"
                                                        alt="Nissan"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Nissan</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/bmw" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/8epyndbgfapwj0RYIU5mMDUk88yFYWjffqLOQMFD.jpg"
                                                        alt="BMW"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">BMW</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/mercedes-benz" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/rCfpiBkUtiOz8Ipakex02EA8uNYXGySvQWH9phRx.jpg"
                                                        alt="Mercedes-Benz"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Mercedes-Benz</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/toyota" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/rkIzWJlmmr3Ae5oJMwgHbFp3Kg9uinm5su2hmHoH.jpg"
                                                        alt="Toyota"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">Toyota</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/jlo" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/h8Yw0ciWRyHOWkDjPcwtsEnH5tXj1ZgagDS2AoO9.jpg"
                                                        alt="JLO"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">JLO</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                                                                                                <div class="col-sm-6">
                                        <a href="https://demo.activeitzone.com/ecommerce/brand/en%27or" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                                                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/07IBDQuzIpkeXZIICV9d3HHS18X20qaFjheGsvWZ.jpg"
                                                        alt="En&#039;or"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">En&#039;or</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                                                                    </div>
                    </div>
                            </div>
        </div>
    </section>
@endsection