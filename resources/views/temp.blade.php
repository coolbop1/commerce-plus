
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="csrf-token" content="P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl">
    <meta name="app-url" content="//demo.activeitzone.com/ecommerce/">
    <meta name="file-base-url" content="//demo.activeitzone.com/ecommerce/public/">

    <title>Active eCommerce | Demo of Active eCommerce CMS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Demo of Active eCommerce CMS" />
    <meta name="keywords" content="">

    
            <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Active eCommerce CMS">
        <meta itemprop="description" content="Demo of Active eCommerce CMS">
        <meta itemprop="image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="Active eCommerce CMS">
        <meta name="twitter:description" content="Demo of Active eCommerce CMS">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg">

        <!-- Open Graph data -->
        <meta property="og:title" content="Active eCommerce CMS" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://demo.activeitzone.com/ecommerce" />
        <meta property="og:image" content="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" />
        <meta property="og:description" content="Demo of Active eCommerce CMS" />
        <meta property="og:site_name" content="Active eCommerce CMS" />
        <meta property="fb:app_id" content="">
    
    <!-- Favicon -->
    <link rel="icon" href="https://demo.activeitzone.com/ecommerce/public/uploads/all/4xnLnzEeu3dFKDGSBMlvLXPLGXFdHEkvqBSZREmO.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/vendors.css">
        <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/aiz-core.css">
    <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/custom-style.css">


    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
    </script>

    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        :root{
            --primary: #e62e04;
            --hov-primary: #e62e04;
            --soft-primary: rgba(230,46,4,0.15);
        }

        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }

        .pac-container { z-index: 100000; }
    </style>




</head>
<body>
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column">

        <!-- Header -->
        <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="#" class="d-block text-reset">
        <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/9iuA7035EikPi8gg5FSLyg8kcUIAzHs2pLAfuiSF.png" class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed" data-toggle="remove-parent" data-parent=".top-banner">
        <i class="la la-close la-2x"></i>
    </button>
</div>
<!-- Top Bar -->
<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035 h-35px h-sm-auto">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col">
                <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                                        <li class="list-inline-item dropdown mr-3" id="lang-change">
                                                <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2" data-toggle="dropdown" data-display="static">
                            <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/en.png" class="mr-2 lazyload" alt="English" height="11">
                            <span class="opacity-60">English</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                                                            <li>
                                    <a href="javascript:void(0)" data-flag="en" class="dropdown-item ">
                                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/en.png" class="mr-1 lazyload" alt="English" height="11">
                                        <span class="language">English</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="javascript:void(0)" data-flag="bd" class="dropdown-item ">
                                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/bd.png" class="mr-1 lazyload" alt="Bangla" height="11">
                                        <span class="language">Bangla</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="javascript:void(0)" data-flag="sa" class="dropdown-item ">
                                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/sa.png" class="mr-1 lazyload" alt="Arabic" height="11">
                                        <span class="language">Arabic</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="javascript:void(0)" data-flag="fr" class="dropdown-item ">
                                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/assets/img/flags/fr.png" class="mr-1 lazyload" alt="French" height="11">
                                        <span class="language">French</span>
                                    </a>
                                </li>
                                                    </ul>
                    </li>
                    
                                        <li class="list-inline-item dropdown ml-auto ml-lg-0 mr-0" id="currency-change">
                                                <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2 opacity-60" data-toggle="dropdown" data-display="static">
                            U.S. Dollar $
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <li>
                                    <a class="dropdown-item  active " href="javascript:void(0)" data-currency="USD">U.S. Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="AUD">Australian Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="BRL">Brazilian Real (R$)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="CAD">Canadian Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="CZK">Czech Koruna (Kč)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="DKK">Danish Krone (kr)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="EUR">Euro (€)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="HKD">Hong Kong Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="HUF">Hungarian Forint (Ft)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="ILS">Israeli New Sheqel ()</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="JPY">Japanese Yen (¥)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="MYR">Malaysian Ringgit (RM)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="MXN">Mexican Peso ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="NOK">Norwegian Krone (kr)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="NZD">New Zealand Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="PHP">Philippine Peso (₱)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="PLN">Polish Zloty (zł)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="GBP">Pound Sterling ()</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="RUB">Russian Ruble (рб)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="SGD">Singapore Dollar ($)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="SEK">Swedish Krona (kr)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="CHF">Swiss Franc (CHF)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="THB">Thai Baht (฿)</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="BDT">Taka ()</a>
                                </li>
                                                            <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-currency="Rupee">Indian Rupee (Rs)</a>
                                </li>
                                                    </ul>
                    </li>
                                    </ul>
            </div>

            <div class="col-5 text-right d-none d-lg-block">
                <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">
                                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                            <a href="tel:+01 112 352 566" class="text-reset d-inline-block opacity-60 py-2">
                                <i class="la la-phone"></i>
                                <span>Help line</span>  
                                <span>+01 112 352 566</span>    
                            </a>
                        </li>
                                                                                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="https://demo.activeitzone.com/ecommerce/admin" class="text-reset d-inline-block opacity-60 py-2">My Panel</a>
                            </li>
                                                <li class="list-inline-item">
                            <a href="https://demo.activeitzone.com/ecommerce/logout" class="text-reset d-inline-block opacity-60 py-2">Logout</a>
                        </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Top Bar -->
<header class=" sticky-top  z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1">
        <div class="container">
            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="https://demo.activeitzone.com/ecommerce">
                                                                            <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ikb1MZlSZBdn6Vn0o8JDFrWuVEeuGMBHV6igl9fc.png" alt="Active eCommerce CMS" class="mw-100 h-30px h-md-40px" height="40">
                                            </a>

                                    </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="https://demo.activeitzone.com/ecommerce/search" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="keyword"  placeholder="I am shopping for..." autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader"><div></div><div></div><div></div></div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        <a href="https://demo.activeitzone.com/ecommerce/compare" class="d-flex align-items-center text-reset">
    <i class="la la-refresh la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
                    <span class="badge badge-primary badge-inline badge-pill">0</span>
                <span class="nav-box-text d-none d-xl-block opacity-70">Compare</span>
    </span>
</a>                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        <a href="https://demo.activeitzone.com/ecommerce/wishlists" class="d-flex align-items-center text-reset">
    <i class="la la-heart-o la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
                    <span class="badge badge-primary badge-inline badge-pill">0</span>
                <span class="nav-box-text d-none d-xl-block opacity-70">Wishlist</span>
    </span>
</a>
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown"
    data-display="static">
    <i class="la la-shopping-cart la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
                    <span class="badge badge-primary badge-inline badge-pill cart-count">0</span>
                <span class="nav-box-text d-none d-xl-block opacity-70">Cart</span>
    </span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">

            <div class="text-center p-3">
            <i class="las la-frown la-3x opacity-60 mb-3"></i>
            <h3 class="h6 fw-700">Your Cart is empty</h3>
        </div>
    
</div>
                    </div>
                </div>

            </div>
        </div>
            </div>
            <div class="bg-white border-top border-gray-200 py-1">
            <div class="container">
                <ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center">
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Home
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/flash-deals" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Flash Sale
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/blog" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Blogs
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/brands" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Brands
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/categories" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Categories
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/sellers" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Sellers
                        </a>
                    </li>
                                        <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/coupons" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Coupons
                        </a>
                    </li>
                                    </ul>
            </div>
        </div>
    </header>

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
                    <li class="category-nav-element" data-id="1">
                <a href="https://demo.activeitzone.com/ecommerce/category/women-clothing-fashion" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/46v0RI8PXlQa4Yy0IftaGaK9rZUQdLOAFkpnjRXT.jpg"
                        width="16"
                        alt="Women Clothing &amp; Fashion"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Women Clothing &amp; Fashion</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="2">
                <a href="https://demo.activeitzone.com/ecommerce/category/men-clothing-fashion" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/LHUk7AM6okO07NvMOkVB35JbQBCLGLjfbRBuUNHc.jpg"
                        width="16"
                        alt="Men Clothing &amp; Fashion"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Men Clothing &amp; Fashion</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="3">
                <a href="https://demo.activeitzone.com/ecommerce/category/computer-accessories" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/kTwoR2hUnTf1y6kAOmt9FUidF6Qo8IK0RkvGVMbi.jpg"
                        width="16"
                        alt="Computer &amp; Accessories"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Computer &amp; Accessories</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="4">
                <a href="https://demo.activeitzone.com/ecommerce/category/automobile-motorcycle" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/vafdWTltz6NGVOA2BOaSC3Y7PPFmxmSHX6KBhn4Z.jpg"
                        width="16"
                        alt="Automobile &amp; Motorcycle"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Automobile &amp; Motorcycle</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="5">
                <a href="https://demo.activeitzone.com/ecommerce/category/kids-toy" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/7Hpz9FWvKRNENKEXd13gqNPlFxz8LFJgCTFzlZbR.jpg"
                        width="16"
                        alt="Kids &amp; toy"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Kids &amp; toy</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="6">
                <a href="https://demo.activeitzone.com/ecommerce/category/sports-outdoor" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/jNdturV05yXj1UsPHurYFoJs410G39D5C2bnPGor.jpg"
                        width="16"
                        alt="Sports &amp; outdoor"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Sports &amp; outdoor</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="7">
                <a href="https://demo.activeitzone.com/ecommerce/category/jewelry-watches" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/R6AnVQNPd89NvPZelfi4F8rfkbFIiu8XteN74BFz.jpg"
                        width="16"
                        alt="Jewelry &amp; Watches"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Jewelry &amp; Watches</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="8">
                <a href="https://demo.activeitzone.com/ecommerce/category/cellphones-tabs" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/JjUx7LIwj97wFpsgffYGwYxtdEiQLVGPtBWYE4wq.jpg"
                        width="16"
                        alt="Cellphones &amp; Tabs"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Cellphones &amp; Tabs</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="9">
                <a href="https://demo.activeitzone.com/ecommerce/category/beauty-health-hair" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/KHQpABDau3b7oMyDFNSJYSMgprsQ1Kq5uij9fw3U.jpg"
                        width="16"
                        alt="Beauty, Health &amp; Hair"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Beauty, Health &amp; Hair</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="10">
                <a href="https://demo.activeitzone.com/ecommerce/category/home-improvement-tools" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/9hMfQOGGQrpmFO1KEbTJ9SijUxM8p8TEsm6o4FVp.jpg"
                        width="16"
                        alt="Home Improvement &amp; Tools"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Home Improvement &amp; Tools</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
                    <li class="category-nav-element" data-id="11">
                <a href="https://demo.activeitzone.com/ecommerce/category/home-decoration-appliance" class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
                        data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/Es0gLpejDOBTdBz4CN1BlT12tFTJDjNDXhtEoVEe.jpg"
                        width="16"
                        alt="Home decoration &amp; Appliance"
                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                    >
                    <span class="cat-name">Home decoration &amp; Appliance</span>
                </a>
                                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                            </li>
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
    

        <section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="https://demo.activeitzone.com/ecommerce/terms">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">Terms &amp; conditions</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="https://demo.activeitzone.com/ecommerce/return-policy">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">Return Policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="https://demo.activeitzone.com/ecommerce/support-policy">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">Support Policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="https://demo.activeitzone.com/ecommerce/privacy-policy">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">Privacy Policy</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark py-5 text-light footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4 text-center text-md-left">
                <div class="mt-4">
                    <a href="https://demo.activeitzone.com/ecommerce" class="d-block">
                                                    <img class="lazyload" src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg" data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/ikb1MZlSZBdn6Vn0o8JDFrWuVEeuGMBHV6igl9fc.png" alt="Active eCommerce CMS" height="44">
                                            </a>
                    <div class="my-3">
                        <span style="color: rgb(242, 243, 248); font-family: "Open Sans", sans-serif; background-color: rgb(17, 23, 35);">Complete system for your eCommerce business</span>
                    </div>
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="https://demo.activeitzone.com/ecommerce/subscribers">
                            <input type="hidden" name="_token" value="P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl">                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </form>
                    </div>
                    <div class="w-300px mw-100 mx-auto mx-md-0">
                                                    <a href="#" target="_blank" class="d-inline-block mr-3 ml-0">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/play.png" class="mx-100 h-40px">
                            </a>
                                                                            <a href="#" target="_blank" class="d-inline-block">
                                <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/app.png" class="mx-100 h-40px">
                            </a>
                                            </div>
                </div>
            </div>
            <div class="col-lg-3 ml-xl-auto col-md-4 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        Contact Info
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                           <span class="d-block opacity-30">Address:</span>
                           <span class="d-block opacity-70">Demo</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">Phone:</span>
                           <span class="d-block opacity-70">123456789</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">Email:</span>
                           <span class="d-block opacity-70">
                               <a href="/cdn-cgi/l/email-protection#ff9b9a9290d19a879e928f939abf98929e9693d19c9092" class="text-reset"><span class="__cf_email__" data-cfemail="9bfffef6f4b5fee3faf6ebf7fedbfcf6faf2f7b5f8f4f6">[email&#160;protected]</span></a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        Quick Links
                    </h4>
                    <ul class="list-unstyled">
                                                                                <li class="mb-2">
                                <a href="sellerpolicy" class="opacity-50 hov-opacity-100 text-reset">
                                    Support Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="returnpolicy" class="opacity-50 hov-opacity-100 text-reset">
                                    Return Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="aboutus" class="opacity-50 hov-opacity-100 text-reset">
                                    About Us
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="privacypolicy" class="opacity-50 hov-opacity-100 text-reset">
                                    Privacy Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="sellerpolicy" class="opacity-50 hov-opacity-100 text-reset">
                                    Seller Policy
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="terms" class="opacity-50 hov-opacity-100 text-reset">
                                    Term Conditions Page
                                </a>
                            </li>
                                                                        </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        My Account
                    </h4>
                    <ul class="list-unstyled">
                                                    <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="https://demo.activeitzone.com/ecommerce/logout">
                                    Logout
                                </a>
                            </li>
                                                <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="https://demo.activeitzone.com/ecommerce/purchase_history">
                                Order History
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="https://demo.activeitzone.com/ecommerce/wishlists">
                                My Wishlist
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="https://demo.activeitzone.com/ecommerce/track-your-order">
                                Track Order
                            </a>
                        </li>
                                                    <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-light" href="https://demo.activeitzone.com/ecommerce/affiliate">Be an affiliate partner</a>
                            </li>
                                            </ul>
                </div>
                                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            Be a Seller
                        </h4>
                        <a href="https://demo.activeitzone.com/ecommerce/shops/create" class="btn btn-primary btn-sm shadow-md">
                            Apply Now
                        </a>
                    </div>
                            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-center text-md-left" current-verison="6.5.0">
                    © Active eCommerce CMS 2021
                </div>
            </div>
            <div class="col-lg-4">
                                <ul class="list-inline my-3 my-md-0 social colored text-center">
                                        <li class="list-inline-item">
                        <a href="https://facebook.com/" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                    </li>
                                                            <li class="list-inline-item">
                        <a href="https://twitter.com/" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                    </li>
                                                            <li class="list-inline-item">
                        <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                    </li>
                                                            <li class="list-inline-item">
                        <a href="https://youtube.com/" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                    </li>
                                                            <li class="list-inline-item">
                        <a href="https://linkedin.com/" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                    </li>
                                    </ul>
                            </div>
            <div class="col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-inline mb-0">
                                                                                    <li class="list-inline-item">
                                    <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/NankP5emHOKcdCWqX6Bks1Qa63iDgoLA6WPGn7oe.png" height="30" class="mw-100 h-auto" style="max-height: 30px">
                                </li>
                                                                        </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
        <div class="col">
            <a href="https://demo.activeitzone.com/ecommerce" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-home fs-20 opacity-60 opacity-100 text-primary"></i>
                <span class="d-block fs-10 fw-600 opacity-60 opacity-100 fw-600">Home</span>
            </a>
        </div>
        <div class="col">
            <a href="https://demo.activeitzone.com/ecommerce/categories" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-list-ul fs-20 opacity-60 "></i>
                <span class="d-block fs-10 fw-600 opacity-60 ">Categories</span>
            </a>
        </div>
                <div class="col-auto">
            <a href="https://demo.activeitzone.com/ecommerce/cart" class="text-reset d-block text-center pb-2 pt-3">
                <span class="align-items-center bg-primary border border-white border-width-4 d-flex justify-content-center position-relative rounded-circle size-50px" style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
                    <i class="las la-shopping-bag la-2x text-white"></i>
                </span>
                <span class="d-block mt-1 fs-10 fw-600 opacity-60 ">
                    Cart
                                        (<span class="cart-count">0</span>)
                </span>
            </a>
        </div>
        <div class="col">
            <a href="https://demo.activeitzone.com/ecommerce/all-notifications" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-inline-block position-relative px-2">
                    <i class="las la-bell fs-20 opacity-60 "></i>
                                            <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 7px;top: -2px;"></span>
                                    </span>
                <span class="d-block fs-10 fw-600 opacity-60 ">Notifications</span>
            </a>
        </div>
        <div class="col">
                                    <a href="https://demo.activeitzone.com/ecommerce/admin" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="d-block mx-auto">
                                                    <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png" class="rounded-circle size-20px">
                                            </span>
                    <span class="d-block fs-10 fw-600 opacity-60">Account</span>
                </a>
                            </div>
    </div>
</div>

    </div>

            <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    <p>We use cookie for better user experience, check our policy <a href="https://demo.activeitzone.com/ecommerce/privacypolicy">here</a>&nbsp;</p>                </div>
                <button class="btn btn-primary aiz-cookie-accept">
                    Ok. I Understood
                </button>
            </div>
        </div>
    
            <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
            <div class="absolute-full bg-black opacity-60"></div>
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md">
                <div class="modal-content position-relative border-0 rounded-0">
                    <div class="aiz-editor-data">
                        <p><img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/dwaK3um8tkVgEsgmZN1peQb844tFRAIQ1wAS8e3z.png" style="width: 100%;"></p><p style="text-align: center; "><br></p><h2 style="text-align: center; "><b>Subscribe to Our Newsletter</b></h2><p style="text-align: center;">Subscribe our newsletter for coupon, offer and exciting promotional discount..</p>
                    </div>
                                            <div class="pb-5 pt-4 px-5">
                            <form class="" method="POST" action="https://demo.activeitzone.com/ecommerce/subscribers">
                                <input type="hidden" name="_token" value="P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl">                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="Your Email Address" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    Subscribe Now
                                </button>
                            </form>
                        </div>
                                        <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session" data-key="website-popup" data-value="removed" data-toggle="remove-parent" data-parent=".website-popup">
                        <i class="la la-close fs-20"></i>
                    </button>
                </div>
            </div>
        </div>
    
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>

            <div class="modal-body">
                <p>Delete confirmation message</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="delete_link" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
    
    <script>
    function account_delete_confirm_modal(delete_url)
    {
        jQuery('#account_delete_confirm').modal('show', {backdrop: 'static'});
        document.getElementById('account_delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="account_delete_confirm" tabindex="-1" role="dialog" aria-labelledby="account_delete_confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header d-block py-4">
                <div class="d-flex justify-content-center">
                    <span class="avatar avatar-md mb-2 mt-2">
                                                    <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/jxUqbB2ThpoDFZbBtPHaiy2pF7i02hDaFJEEF9rx.png" class="m-auto"
                                onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
                                            </span>
                </div>
                <h4 class="modal-title text-center fw-700" id="account_delete_confirmModalLabel" style="color: #ff9819;">Delete Your Account</h4>
                <p class="fs-16 fw-600 text-center" style="color: #8d8d8d;">Warning: You cannot undo this action</p>
            </div>

            <div class="modal-body pt-3 pb-5 px-xl-5">
                <p class="text-danger mt-3"><i><strong>Note:&nbsp;Don&#039;t Click to any button or don&#039;t do any action during account Deletion, it may takes some times.</strong></i></p>
                <p class="fs-14 fw-700" style="color: #8d8d8d;">Deleting Account Means:</p>
                <div class="row bg-soft-warning py-2 mb-2 ml-0 mr-0 border-left border-width-2 border-danger">
                    <div class="col-1">
                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/warning.png" class="h-20px">
                    </div>
                    <div class="col">
                        <p class="fw-600 mb-0">If you create any classified ptoducts, after deleting your account, those products will no longer in our system</p>
                    </div>
                </div>
                <div class="row bg-soft-warning py-3 ml-0 mr-0 border-left border-width-2 border-danger">
                    <div class="col-1">
                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/warning.png" class="h-20px">
                    </div>
                    <div class="col">
                        <p class="fw-600 mb-0">After deleting your account, wallet balance no longer in our system</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="account_delete_link" class="btn btn-danger btn-rounded btn-ok">Delete Account</a>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la-2x">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    
    <!-- SCRIPTS -->
    <script src="https://demo.activeitzone.com/ecommerce/public/assets/js/vendors.js"></script>
    <script src="https://demo.activeitzone.com/ecommerce/public/assets/js/aiz-core.js"></script>



            <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({
                  xfbml            : true,
                  version          : 'v3.3'
                });
              };

              (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="">
        </div>
    
    <script>
            </script>

    <script>

        $(document).ready(function() {
            $('.category-nav-element').each(function(i, el) {
                $(el).on('mouseover', function(){
                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                        $.post('https://demo.activeitzone.com/ecommerce/category/nav-element-list', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){
                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                        });
                    }
                });
            });
            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('https://demo.activeitzone.com/ecommerce/language',{_token: AIZ.data.csrf, locale:locale}, function(data){
                            location.reload();
                        });

                    });
                });
            }

            if ($('#currency-change').length > 0) {
                $('#currency-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var currency_code = $this.data('currency');
                        $.post('https://demo.activeitzone.com/ecommerce/currency',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){
                            location.reload();
                        });

                    });
                });
            }
        });

        $('#search').on('keyup', function(){
            search();
        });

        $('#search').on('focus', function(){
            search();
        });

        function search(){
            var searchKey = $('#search').val();
            if(searchKey.length > 0){
                $('body').addClass("typed-search-box-shown");

                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');
                $.post('https://demo.activeitzone.com/ecommerce/ajax-search', { _token: AIZ.data.csrf, search:searchKey}, function(data){
                    if(data == '0'){
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+searchKey+'"</strong>');
                        $('.search-preloader').addClass('d-none');

                    }
                    else{
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                });
            }
            else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }

        function updateNavCart(view,count){
            $('.cart-count').html(count);
            $('#cart_items').html(view);
        }

        function removeFromCart(key){
            $.post('https://demo.activeitzone.com/ecommerce/cart/removeFromCart', {
                _token  : AIZ.data.csrf,
                id      :  key
            }, function(data){
                updateNavCart(data.nav_cart_view,data.cart_count);
                $('#cart-summary').html(data.cart_view);
                AIZ.plugins.notify('success', "Item has been removed from cart");
                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
            });
        }

        function addToCompare(id){
            $.post('https://demo.activeitzone.com/ecommerce/compare/addToCompare', {_token: AIZ.data.csrf, id:id}, function(data){
                $('#compare').html(data);
                AIZ.plugins.notify('success', "Item has been added to compare list");
                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
            });
        }

        function addToWishList(id){
                            AIZ.plugins.notify('warning', "Please Login as a customer to add products to the WishList.");
                    }

        function showAddToCartModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('https://demo.activeitzone.com/ecommerce/cart/show-cart-modal', {_token: AIZ.data.csrf, id:id}, function(data){
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

        $('#option-choice-form input').on('change', function(){
            getVariantPrice();
        });

        function getVariantPrice(){
            if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
                $.ajax({
                   type:"POST",
                   url: 'https://demo.activeitzone.com/ecommerce/product/variant_price',
                   data: $('#option-choice-form').serializeArray(),
                   success: function(data){

                        $('.product-gallery-thumb .carousel-box').each(function (i) {
                            if($(this).data('variation') && data.variation == $(this).data('variation')){
                                $('.product-gallery-thumb').slick('slickGoTo', i);
                            }
                        })

                        $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        $('#available-quantity').html(data.quantity);
                        $('.input-number').prop('max', data.max_limit);
                        if(parseInt(data.in_stock) == 0 && data.digital  == 0){
                           $('.buy-now').addClass('d-none');
                           $('.add-to-cart').addClass('d-none');
                           $('.out-of-stock').removeClass('d-none');
                        }
                        else{
                           $('.buy-now').removeClass('d-none');
                           $('.add-to-cart').removeClass('d-none');
                           $('.out-of-stock').addClass('d-none');
                        }

                        AIZ.extra.plusMinus();
                   }
               });
            }
        }

        function checkAddToCartValidity(){
            var names = {};
            $('#option-choice-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });

            if($('#option-choice-form input:radio:checked').length == count){
                return true;
            }

            return false;
        }

        function addToCart(){
                            AIZ.plugins.notify('warning', "Please Login as a customer to add products to the Cart.");
                return false;
            
            if(checkAddToCartValidity()) {
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type:"POST",
                    url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){

                       $('#addToCart-modal-body').html(null);
                       $('.c-preloader').hide();
                       $('#modal-size').removeClass('modal-lg');
                       $('#addToCart-modal-body').html(data.modal_view);
                       AIZ.extra.plusMinus();
                       AIZ.plugins.slickCarousel();
                       updateNavCart(data.nav_cart_view,data.cart_count);
                    }
                });
            }
            else{
                AIZ.plugins.notify('warning', "Please choose all the options");
            }
        }

        function buyNow(){
                            AIZ.plugins.notify('warning', "Please Login as a customer to add products to the Cart.");
                return false;
                        
            if(checkAddToCartValidity()) {
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                   type:"POST",
                   url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
                   data: $('#option-choice-form').serializeArray(),
                   success: function(data){
                       if(data.status == 1){

                            $('#addToCart-modal-body').html(data.modal_view);
                            updateNavCart(data.nav_cart_view,data.cart_count);

                            window.location.replace("https://demo.activeitzone.com/ecommerce/cart");
                       }
                       else{
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.modal_view);
                       }
                   }
               });
            }
            else{
                AIZ.plugins.notify('warning', "Please choose all the options");
            }
        }

    </script>

        <script>
        $(document).ready(function(){
            $.post('https://demo.activeitzone.com/ecommerce/home/section/featured', {_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('https://demo.activeitzone.com/ecommerce/home/section/best_selling', {_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('https://demo.activeitzone.com/ecommerce/home/section/auction_products', {_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('https://demo.activeitzone.com/ecommerce/home/section/home_categories', {_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('https://demo.activeitzone.com/ecommerce/home/section/best_sellers', {_token:'P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>

    
</body>
</html>