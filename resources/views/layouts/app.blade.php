
@php
    if(isset($_SESSION['logged_in'])) {
        $user = $user ?? $_SESSION['logged_in'];
        $cart = $user->carts->count();
        $role = optional($user->roles->first())->name;
    } else {
        $cart = 0;
        $user = null;
    }
    
@endphp
@include('layouts.foot')
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}"">
    <meta name="app-url" content="">
    <meta name="file-base-url" content="">

    <title>HUB-PLUS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Demo of Active eCommerce CMS" />
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
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
    <link rel="icon" href="/uploads/icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/vendors.css">
        <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/aiz-core.css"> --}}
    <link rel="stylesheet" href="/css/vendors.css">
    <link rel="stylesheet" href="/css/temp.css">
    <link rel="stylesheet" href="/assets/css/custom-style.css">
    {{-- <link rel="stylesheet" href="https://demo.activeitzone.com/ecommerce/public/assets/css/custom-style.css"> --}}

    {{-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> --}}
    <link rel="stylesheet" href="/1.3.0/css/line-awesome.min.css">
    <script src="/js/app.js"></script>
    

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
        #alert-modal {
            position: fixed;
            top: 100px;
            width: 80%;
            z-index: 50000;
            left:10%
        }
        .hide {
            display: none;
        }

    
        .show {
            display: block;
        }
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
<body onload="populateCartCount();  populateCartPage(); ">
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column">

        <div id="alert-modal" class="alert hide" role="alert"></div>
        <!-- Header -->
        <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="#" class="d-block text-reset">
        <img src="/assets/img/Group-1255.png" class="w-100 mw-100 h-50px h-lg-auto img-fit">
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
                    <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                        <a href="tel:+234 700 CPLUSNG" class="text-reset d-inline-block opacity-60 py-2">
                            <i class="la la-phone"></i>
                            <span>Help line</span>  
                            <span>+234 700 CPLUSNG</span>    
                        </a>
                    </li>                  
                </ul>
            </div>

            <div id="top-account-access" class="col-5 text-right d-none d-lg-block">
                @if ($user)
                    <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">
                        @if ($user->stores->count() > 0 && $role == 'ROLE_VENDOR')
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/seller/dashboard" class="text-reset d-inline-block opacity-60 py-2">My Dashboard</a>
                            </li>   
                        @elseif ($role == 'ROLE_SUPERADMIN')
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/admin" class="text-reset d-inline-block opacity-60 py-2">Admin Dashboard</a>
                            </li>
                        @elseif ($role == 'ROLE_DELIVERY')
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/delivery/dashboard" class="text-reset d-inline-block opacity-60 py-2">Delivery Dashboard</a>
                            </li>
                        @else
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/dashboard" class="text-reset d-inline-block opacity-60 py-2">Account ({{ $user->email }})</a>
                            </li>
                        @endif
                        <li class="list-inline-item">
                            <a style="cursor: pointer;" onclick="return logout()" class="text-reset d-inline-block opacity-60 py-2">Logout</a>
                        </li>
                    </ul>
                @else
                    <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">    
                        <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                            <a href="/login" class="text-reset d-inline-block opacity-60 py-2">Login</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/register" class="text-reset d-inline-block opacity-60 py-2">Registration</a>
                        </li>
                    </ul>
                @endif
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
                    <a class="d-block py-20px mr-3 ml-0" href="/">
                        <img src="/uploads/logo.png" alt="COMMERCE PLUS" class="mw-100 h-30px h-md-30px" height="40">
                    </a>

                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="/search" method="GET" class="stop-propagation">
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
                    <div class="" id="wishlist">
                        <a href="/wishlists" class="d-flex align-items-center text-reset">
                            <i class="la la-heart-o la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1">
                                <span id="wishlist-count-top" class="badge badge-primary badge-inline badge-pill">{{ optional(optional($user)->wishList)->count() ?? 0 }}</span>
                                <span class="nav-box-text d-none d-xl-block opacity-70">Wishlist</span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
                            <i class="la la-shopping-cart la-2x opacity-80"></i>
                            <span class="flex-grow-1 ml-1">
                                <span id="cart-count-top" class="badge badge-primary badge-inline badge-pill cart-count">{{ $cart ?? 0 }}</span>
                                <span class="nav-box-text d-none d-xl-block opacity-70">Cart</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">

                                <div id="cart-list-top" class="text-center p-3">
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
                        <a href="/" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Home
                        </a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="/flash-deals" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Flash Sale
                        </a>
                    </li>
                    {{-- <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/blog" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Blogs
                        </a>
                    </li> --}}
                    <li class="list-inline-item mr-0">
                        <a href="/brands" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Brands
                        </a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="/categories" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Categories
                        </a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="/sellers" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Sellers
                        </a>
                    </li>
                    {{-- <li class="list-inline-item mr-0">
                        <a href="coupons" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Coupons
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </header>
        @yield('content')
    </div>
    @yield('foots')
    <!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-center text-md-left" current-verison="6.5.0">
                    © Commerce Plus <script> document.write((new Date).getFullYear()) </script>
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
            <a href="/" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-home fs-20 opacity-60 opacity-100 text-primary"></i>
                <span class="d-block fs-10 fw-600 opacity-60 opacity-100 fw-600">Home</span>
            </a>
        </div>
        <div class="col">
            <a href="/categories" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-list-ul fs-20 opacity-60 "></i>
                <span class="d-block fs-10 fw-600 opacity-60 ">Categories</span>
            </a>
        </div>
                <div class="col-auto">
            <a href="/cart" class="text-reset d-block text-center pb-2 pt-3">
                <span class="align-items-center bg-primary border border-white border-width-4 d-flex justify-content-center position-relative rounded-circle size-50px" style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
                    <i class="las la-shopping-bag la-2x text-white"></i>
                </span>
                <span class="d-block mt-1 fs-10 fw-600 opacity-60 ">
                    Cart
                                        (<span id="cart-count-bottom" class="cart-count">0</span>)
                </span>
            </a>
        </div>
        <div class="col">
            <a href="/all-notifications" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-inline-block position-relative px-2">
                    <i class="las la-bell fs-20 opacity-60 "></i>
                                            <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 7px;top: -2px;"></span>
                                    </span>
                <span class="d-block fs-10 fw-600 opacity-60 ">Notifications</span>
            </a>
        </div>
        <div class="col">
            @php
                $is_buyer = false
            @endphp
            @if ($user)
                @if ($user->stores->count() > 0 && $role == 'ROLE_VENDOR')
                    <a href="/seller/dashboard" class="text-reset d-block text-center pb-2 pt-3">   
                @elseif ($role == 'ROLE_SUPERADMIN')
                    <a href="/admin" class="text-reset d-block text-center pb-2 pt-3">
                @elseIf ($role == 'ROLE_DELIVERY')
                    <a href="/delivery/dashboard" class="text-reset d-block text-center pb-2 pt-3">
                @else
                @php
                    $is_buyer = true;
                @endphp
                <a href="javascript:void(0)" class="text-secondary d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                @endif
            @else
                <a href="/login" class="text-reset d-block text-center pb-2 pt-3">
            @endif
                    <span class="d-block mx-auto">
                                                    <img src="/assets/img/avatar-place.png" class="rounded-circle size-20px">
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
                    <p>We use cookie for better user experience, check our policy <a href="/privacypolicy">here</a>&nbsp;</p>                </div>
                <button class="btn btn-primary aiz-cookie-accept">
                    Ok. I Understood
                </button>
            </div>
        </div>
    
        @if ($user && $is_buyer)
        <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
            <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
            <div class="collapse-sidebar bg-white">
                <div class="aiz-user-sidenav-wrap position-relative z-1 rounded-0">
        <div class="aiz-user-sidenav overflow-auto c-scrollbar-light px-4 pb-4">
            <!-- Close button -->
            <div class="d-xl-none">
                <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static"
                    data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
                    <i class="las la-times la-2x"></i>
                </button>
            </div>
    
            <!-- Customer info -->
            <div class="p-4 text-center mb-4 border-bottom position-relative">
                <!-- Image -->
                <span class="avatar avatar-md mb-3">
                                        <img src="/"
                            onerror="this.onerror=null;this.src='/assets/img/avatar-place.png';">
                                </span>
                <!-- Name -->
                <h4 class="h5 fs-14 mb-1 fw-700 text-dark">{{ $user->name }}</h4>
                <!-- Phone -->
                                <div class="text-truncate opacity-60 fs-12">{{ $user->phone }}</div>
                <!-- Email -->
                        </div>
    
            <!-- Menus -->
            <div class="sidemnenu">
                <ul class="aiz-side-nav-list mb-3 pb-3 border-bottom" data-toggle="aiz-side-menu">
                    
                    <!-- Dashboard -->
                    <li class="aiz-side-nav-item">
                        <a href="/dashboard" class="aiz-side-nav-link ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_24768" data-name="Group 24768" transform="translate(3495.144 -602)">
                                  <path id="Path_2916" data-name="Path 2916" d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z" transform="translate(-3495.144 602)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Dashboard</span>
                        </a>
                    </li>
    
                    
                    <!-- Purchase History -->
                    <li class="aiz-side-nav-item">
                        <a href="/purchase_history"
                            class="aiz-side-nav-link ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_8109" data-name="Group 8109" transform="translate(-27.466 -542.963)">
                                    <path id="Path_2953" data-name="Path 2953" d="M14.5,5.963h-4a1.5,1.5,0,0,0,0,3h4a1.5,1.5,0,0,0,0-3m0,2h-4a.5.5,0,0,1,0-1h4a.5.5,0,0,1,0,1" transform="translate(22.966 537)" fill="#b5b5bf"/>
                                    <path id="Path_2954" data-name="Path 2954" d="M12.991,8.963a.5.5,0,0,1,0-1H13.5a2.5,2.5,0,0,1,2.5,2.5v10a2.5,2.5,0,0,1-2.5,2.5H2.5a2.5,2.5,0,0,1-2.5-2.5v-10a2.5,2.5,0,0,1,2.5-2.5h.509a.5.5,0,0,1,0,1H2.5a1.5,1.5,0,0,0-1.5,1.5v10a1.5,1.5,0,0,0,1.5,1.5h11a1.5,1.5,0,0,0,1.5-1.5v-10a1.5,1.5,0,0,0-1.5-1.5Z" transform="translate(27.466 536)" fill="#b5b5bf"/>
                                    <path id="Path_2955" data-name="Path 2955" d="M7.5,15.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5" transform="translate(23.966 532)" fill="#b5b5bf"/>
                                    <path id="Path_2956" data-name="Path 2956" d="M7.5,21.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5" transform="translate(23.966 529)" fill="#b5b5bf"/>
                                    <path id="Path_2957" data-name="Path 2957" d="M7.5,27.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5" transform="translate(23.966 526)" fill="#b5b5bf"/>
                                    <path id="Path_2958" data-name="Path 2958" d="M13.5,16.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1" transform="translate(20.966 531.5)" fill="#b5b5bf"/>
                                    <path id="Path_2959" data-name="Path 2959" d="M13.5,22.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1" transform="translate(20.966 528.5)" fill="#b5b5bf"/>
                                    <path id="Path_2960" data-name="Path 2960" d="M13.5,28.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1" transform="translate(20.966 525.5)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Purchase History</span>
                                                </a>
                    </li>
    
                    <!-- Downloads -->
                    <li class="aiz-side-nav-item">
                        <a href="/digital-purchase-history"
                            class="aiz-side-nav-link ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.001" height="16" viewBox="0 0 16.001 16">
                                <g id="Group_8110" data-name="Group 8110" transform="translate(-1388.154 -562.604)">
                                    <path id="Path_2963" data-name="Path 2963" d="M77.864,98.69V92.1a.5.5,0,1,0-1,0V98.69l-1.437-1.437a.5.5,0,0,0-.707.707l1.851,1.852a1,1,0,0,0,.707.293h.172a1,1,0,0,0,.707-.293l1.851-1.852a.5.5,0,0,0-.7-.713Z" transform="translate(1318.79 478.5)" fill="#b5b5bf"/>
                                    <path id="Path_2964" data-name="Path 2964" d="M67.155,88.6a3,3,0,0,1-.474-5.963q-.009-.089-.015-.179a5.5,5.5,0,0,1,10.977-.718,3.5,3.5,0,0,1-.989,6.859h-1.5a.5.5,0,0,1,0-1l1.5,0a2.5,2.5,0,0,0,.417-4.967.5.5,0,0,1-.417-.5,4.5,4.5,0,1,0-8.908.866.512.512,0,0,1,.009.121.5.5,0,0,1-.52.479,2,2,0,1,0-.162,4l.081,0h2a.5.5,0,0,1,0,1Z" transform="translate(1324 486)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Downloads</span>
                        </a>
                    </li>
                    
                    <!-- Refund Requests -->
                                        <li class="aiz-side-nav-item">
                            <a href="/sent-refund-request"
                                class="aiz-side-nav-link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="Group_8107" data-name="Group 8107" transform="translate(-134.153 -539.823)">
                                        <path id="Path_2951" data-name="Path 2951" d="M119.549,4.47h2.033a.5.5,0,0,0,0-1h-3.24a.5.5,0,0,0-.5.5v3.24a.5.5,0,0,0,1,0V5.189a7,7,0,1,1-4.155-1.366.5.5,0,0,0,0-1,8,8,0,1,0,4.862,1.647" transform="translate(27.466 537)" fill="#b5b5bf"/>
                                        <path id="Path_2952" data-name="Path 2952" d="M120.688,9.323v-1a.5.5,0,0,0-1,0v1a2,2,0,0,0-2,2v.5a2,2,0,0,0,2,2h1a1,1,0,0,1,1,1v.5a1,1,0,0,1-1,1h-1a1,1,0,0,1-1-1,.5.5,0,1,0-1,0,2,2,0,0,0,2,2v1a.5.5,0,0,0,1,0v-1a2,2,0,0,0,2-2v-.5a2,2,0,0,0-2-2h-1a1,1,0,0,1-1-1v-.5a1,1,0,0,1,1-1h1a1,1,0,0,1,1,1,.5.5,0,0,0,1,0,2,2,0,0,0-2-2" transform="translate(21.965 534.5)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Refund Requests</span>
                            </a>
                        </li>
                    
                    <!-- Wishlist -->
                    <li class="aiz-side-nav-item">
                        <a href="/wishlists"
                            class="aiz-side-nav-link ">
                            <svg id="Group_8116" data-name="Group 8116" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="14" viewBox="0 0 16 14">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_1391" data-name="Rectangle 1391" width="16" height="14" fill="#b5b5bf"/>
                                    </clipPath>
                                </defs>
                                <g id="Group_8115" data-name="Group 8115" clip-path="url(#clip-path)">
                                    <path id="Path_2981" data-name="Path 2981" d="M14.682,1.318a4.5,4.5,0,0,0-6.364,0L8,1.636l-.318-.318A4.5,4.5,0,0,0,1.318,7.682l6.046,6.054a.9.9,0,0,0,1.273,0l6.045-6.054a4.5,4.5,0,0,0,0-6.364m-.707,5.657L8,12.959,2.025,6.975a3.5,3.5,0,0,1,4.95-4.95l.389.389a.9.9,0,0,0,1.273,0l.388-.389a3.5,3.5,0,0,1,4.95,4.95" transform="translate(0 0)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Wishlist</span>
                        </a>
                    </li>
{{--     
    
                    <!-- Followed Sellers -->
                    <li class="aiz-side-nav-item">
                        <a href="https://demo.activeitzone.com/ecommerce/followed-seller" class="aiz-side-nav-link ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_8114" data-name="Group 8114" transform="translate(-1501.679 -486)">
                                    <path id="Path_2977" data-name="Path 2977" d="M193.408,3.756,192.05.862A1.5,1.5,0,0,0,190.692,0H180.666a1.5,1.5,0,0,0-1.357.862L177.95,3.756l.029-.062A3,3,0,0,0,179.373,7.7a3.091,3.091,0,0,0,.306.128V16h12V9.5a.5.5,0,0,0-1,0V15h-3V10.5a.5.5,0,0,0-.5-.5h-3a.5.5,0,0,0-.5.5V15h-3V8a3,3,0,0,0,2.5-1.342,3,3,0,0,0,5,0,3,3,0,0,0,5.229-2.9M184.679,11h2v4h-2Zm6.4-4.041A2,2,0,0,1,188.719,5.4a.5.5,0,0,0-.49-.4h-.1a.5.5,0,0,0-.49.4,2,2,0,0,1-3.919,0,.5.5,0,0,0-.49-.4h-.1a.5.5,0,0,0-.49.4,2,2,0,1,1-3.781-1.225l1.357-2.888A.5.5,0,0,1,180.666,1h10.025a.5.5,0,0,1,.452.288L192.5,4.175a2,2,0,0,1-1.422,2.784" transform="translate(1324 486)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Followed Sellers</span>
                        </a>
                    </li> --}}
    
                    {{-- <!-- Classified Products -->
                                        <li class="aiz-side-nav-item">
                            <a href="https://demo.activeitzone.com/ecommerce/customer_products"
                                class="aiz-side-nav-link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16.002" height="16.001" viewBox="0 0 16.002 16.001">
                                    <g id="Group_24750" data-name="Group 24750" transform="translate(-242.999 -1172.998)">
                                        <g id="Group_24748" data-name="Group 24748" transform="translate(85 -22)">
                                        <path id="Subtraction_183" data-name="Subtraction 183" d="M16260.5,1270h-5a1.5,1.5,0,0,1,0-3h5a1.5,1.5,0,1,1,0,3Zm-5-2a.5.5,0,0,0,0,1h5a.5.5,0,1,0,0-1Z" transform="translate(-16096 -67)" fill="#b5b5bf"/>
                                        <path id="Subtraction_180" data-name="Subtraction 180" d="M16256,1271a2,2,0,1,1,2-2A2,2,0,0,1,16256,1271Zm0-3a1,1,0,1,0,1,1A1,1,0,0,0,16256,1268Z" transform="translate(-16094 -72)" fill="#b5b5bf"/>
                                        </g>
                                        <g id="Group_24749" data-name="Group 24749" transform="translate(93 -14)">
                                        <path id="Subtraction_182" data-name="Subtraction 182" d="M16252.5,1262h-5a1.5,1.5,0,1,1,0-3h5a1.5,1.5,0,1,1,0,3Zm-5-2a.5.5,0,0,0,0,1h5a.5.5,0,0,0,0-1Z" transform="translate(-16088 -59)" fill="#b5b5bf"/>
                                        <path id="Subtraction_181" data-name="Subtraction 181" d="M16248,1263a2,2,0,1,1,2-2A2,2,0,0,1,16248,1263Zm0-3a1,1,0,1,0,1,1A1,1,0,0,0,16248,1260Z" transform="translate(-16086 -64)" fill="#b5b5bf"/>
                                        </g>
                                        <path id="Subtraction_174" data-name="Subtraction 174" d="M16418,892h-1v-1a4,4,0,0,0-4-4h-1v-1h1a5.006,5.006,0,0,1,5,5v1Z" transform="translate(-16159 287)" fill="#b5b5bf"/>
                                        <path id="Subtraction_176" data-name="Subtraction 176" d="M6,6H5V5A4,4,0,0,0,1,1H0V0H1A5.005,5.005,0,0,1,6,5V6Z" transform="translate(249 1188.963) rotate(180)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Classified Products</span>
                            </a>
                        </li> --}}
                    
                    <!-- Auction -->
                                        {{-- <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link">
                                <svg id="Group_8142" data-name="Group 8142" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                    <defs>
                                        <clipPath id="clip-path">
                                        <rect id="Rectangle_1420" data-name="Rectangle 1420" width="16" height="16" fill="#b5b5bf"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Group_8141" data-name="Group 8141" clip-path="url(#clip-path)">
                                        <path id="Path_3023" data-name="Path 3023" d="M5.3,13.642,11.217,5.2,9.58,4.059a.5.5,0,0,1-.819-.573L11.055.213a.5.5,0,0,1,.819.573L17.607,4.8a.5.5,0,0,1,.819.573L16.131,8.643a.5.5,0,0,1-.819-.573L13.675,6.924,7.762,15.361A1.5,1.5,0,0,1,5.3,13.642M15.886,7.251l1.147-1.637L11.3,1.6,10.153,3.241ZM6.246,14.91a.5.5,0,0,0,.7-.122l5.913-8.437-.819-.573L6.123,14.215a.5.5,0,0,0,.123.7" transform="translate(-5.033 0)" fill="#b5b5bf"/>
                                        <path id="Path_3024" data-name="Path 3024" d="M3,30.472a.5.5,0,0,0,.5.5h7a.5.5,0,1,0,0-1h-7a.5.5,0,0,0-.5.5" transform="translate(3.5 -14.986)" fill="#b5b5bf"/>
                                        <path id="Path_3025" data-name="Path 3025" d="M6.5,24.976h4a.5.5,0,0,1,.5.5v2H10v-1.5H7v1.5H6v-2a.5.5,0,0,1,.5-.5" transform="translate(2 -12.488)" fill="#b5b5bf"/>
                                        <path id="Path_3026" data-name="Path 3026" d="M0,24.478H0a.5.5,0,0,0,.5.5h1a.5.5,0,1,0,0-1H.5a.5.5,0,0,0-.5.5" transform="translate(14 -11.989)" fill="#b5b5bf"/>
                                        <path id="Path_3027" data-name="Path 3027" d="M4.439,19.007a.5.5,0,0,0-.707,0l-.707.706a.5.5,0,0,0,.707.706l.707-.706a.5.5,0,0,0,0-.706" transform="translate(9.975 -9.431)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Auction</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/auction_product_bids" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Bidded Products</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/auction/purchase_history"
                                        class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Purchase History</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    
                    <!-- Conversations -->
                                                            {{-- <li class="aiz-side-nav-item">
                            <a href="https://demo.activeitzone.com/ecommerce/conversations"
                                class="aiz-side-nav-link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="Group_8134" data-name="Group 8134" transform="translate(1053.151 256.688)">
                                        <path id="Path_3012" data-name="Path 3012" d="M134.849,88.312h-8a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2v3l2.4-3h5.6a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2m1,7a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-5a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z" transform="translate(-1178 -341)" fill="#b5b5bf"/>
                                        <path id="Path_3013" data-name="Path 3013" d="M134.849,81.312h8a1,1,0,0,1,1,1v5a1,1,0,0,1-1,1h-.5a.5.5,0,0,0,0,1h.5a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2h-8a2,2,0,0,0-2,2v.5a.5.5,0,0,0,1,0v-.5a1,1,0,0,1,1-1" transform="translate(-1182 -337)" fill="#b5b5bf"/>
                                        <path id="Path_3014" data-name="Path 3014" d="M131.349,93.312h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1" transform="translate(-1181 -343.5)" fill="#b5b5bf"/>
                                        <path id="Path_3015" data-name="Path 3015" d="M131.349,99.312h5a.5.5,0,1,1,0,1h-5a.5.5,0,1,1,0-1" transform="translate(-1181 -346.5)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Conversations</span>
                                                        </a>
                        </li> --}}
                    
                    <!-- My Wallet -->
                                        <li class="aiz-side-nav-item">
                            <a href="/wallet"
                                class="aiz-side-nav-link ">
                                <svg id="Group_8103" data-name="Group 8103" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                    <defs>
                                        <clipPath id="clip-path">
                                        <rect id="Rectangle_1386" data-name="Rectangle 1386" width="16" height="16" fill="#b5b5bf"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Group_8102" data-name="Group 8102" clip-path="url(#clip-path)">
                                        <path id="Path_2936" data-name="Path 2936" d="M13.5,4H13V2.5A2.5,2.5,0,0,0,10.5,0h-8A2.5,2.5,0,0,0,0,2.5v11A2.5,2.5,0,0,0,2.5,16h11A2.5,2.5,0,0,0,16,13.5v-7A2.5,2.5,0,0,0,13.5,4M2.5,1h8A1.5,1.5,0,0,1,12,2.5V4H2.5a1.5,1.5,0,0,1,0-3M15,11H10a1,1,0,0,1,0-2h5Zm0-3H10a2,2,0,0,0,0,4h5v1.5A1.5,1.5,0,0,1,13.5,15H2.5A1.5,1.5,0,0,1,1,13.5v-9A2.5,2.5,0,0,0,2.5,5h11A1.5,1.5,0,0,1,15,6.5Z" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">My Wallet</span>
                            </a>
                        </li>
                    
                    <!-- Earning Points -->
                                        {{-- <li class="aiz-side-nav-item">
                            <a href="https://demo.activeitzone.com/ecommerce/earning-points"
                                class="aiz-side-nav-link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="Group_24762" data-name="Group 24762" transform="translate(-240.535 -537)">
                                        <path id="Path_2961" data-name="Path 2961" d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7" transform="translate(27.466 537)" fill="#b5b5bf"/>
                                        <path id="Union_11" data-name="Union 11" d="M16425.393,420.226l-3.777-5.039a.42.42,0,0,1-.012-.482l1.662-2.515a.416.416,0,0,1,.313-.186l0,0h4.26a.41.41,0,0,1,.346.19l1.674,2.515a.414.414,0,0,1-.012.482l-3.777,5.039a.413.413,0,0,1-.338.169A.419.419,0,0,1,16425.393,420.226Zm-2.775-5.245,3.113,4.148,3.109-4.148-1.32-1.983h-3.592Z" transform="translate(-16177.195 129)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Earning Points</span>
                            </a>
                        </li> --}}
                    
                    <!-- Affiliate -->
                                        {{-- <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);"
                                class="aiz-side-nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.998" height="19.998" viewBox="0 0 19.998 19.998">
                                    <g id="Group_25000" data-name="Group 25000" transform="translate(-298 -935.05)">
                                        <path id="Union_13" data-name="Union 13" d="M8.931,6.946h.993a.5.5,0,1,1-.993,0ZM0,6.946V4.962a4.962,4.962,0,0,1,9.923,0V6.945H8.932V4.962a3.969,3.969,0,0,0-7.939,0V6.946h0a.5.5,0,1,1-.993,0Z" transform="translate(310.981 935.05) rotate(45)" fill="#b5b5bf"/>
                                        <path id="Union_14" data-name="Union 14" d="M0,2.48V.5A.5.5,0,0,1,.993.5h0V2.48a3.969,3.969,0,1,0,7.939,0V.5h.992V2.48A4.962,4.962,0,0,1,0,2.48ZM8.931.5a.5.5,0,0,1,.993,0Z" transform="translate(303.263 942.769) rotate(45)" fill="#b5b5bf"/>
                                        <rect id="Rectangle_18625" data-name="Rectangle 18625" width="0.992" height="7.939" rx="0.496" transform="translate(309.93 942.417) rotate(45)" fill="#b5b5bf"/>
                                    </g>
                                </svg>
                                <span class="aiz-side-nav-text ml-3">Affiliate</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/affiliate/user" class="aiz-side-nav-link ">
                                        <span class="aiz-side-nav-text">Affiliate System</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/payment_history"
                                        class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">Payment History</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/affiliate/user/withdraw_request_history"
                                        class="aiz-side-nav-link">
                                        <span
                                            class="aiz-side-nav-text">Withdraw request history</span>
                                    </a>
                                </li>
    
                            </ul>
                        </li> --}}
                    
                    
                    <!-- Support Ticket -->
                    <li class="aiz-side-nav-item">
                        <a href="/support_ticket"
                            class="aiz-side-nav-link ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.001" viewBox="0 0 16 16.001">
                                <g id="Group_24764" data-name="Group 24764" transform="translate(-316 -1066)">
                                    <path id="Subtraction_184" data-name="Subtraction 184" d="M16427.109,902H16420a8.015,8.015,0,1,1,8-8,8.278,8.278,0,0,1-1.422,4.535l1.244,2.132a.81.81,0,0,1,0,.891A.791.791,0,0,1,16427.109,902ZM16420,887a7,7,0,1,0,0,14h6.283c.275,0,.414,0,.549-.111s-.209-.574-.34-.748l0,0-.018-.022-1.064-1.6A6.829,6.829,0,0,0,16427,894a6.964,6.964,0,0,0-7-7Z" transform="translate(-16096 180)" fill="#b5b5bf"/>
                                    <path id="Union_12" data-name="Union 12" d="M16414,895a1,1,0,1,1,1,1A1,1,0,0,1,16414,895Zm.5-2.5V891h.5a2,2,0,1,0-2-2h-1a3,3,0,1,1,3.5,2.958v.54a.5.5,0,1,1-1,0Zm-2.5-3.5h1a.5.5,0,1,1-1,0Z" transform="translate(-16090.998 183.001)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Support Ticket</span>
                                                        <span class="badge badge-inline badge-success">1</span>
                                                </a>
                    </li>
                    
                    <!-- Manage Profile -->
                    <li class="aiz-side-nav-item">
                        <a href="/profile" class="aiz-side-nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                                  <path id="Path_2924" data-name="Path 2924" d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3" transform="translate(-3499.144 602)" fill="#b5b5bf"/>
                                  <path id="Path_2925" data-name="Path 2925" d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4" transform="translate(-3495.144 592)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Manage Profile</span>
                        </a>
                    </li>
    
                    <!-- Delete My Account -->
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0)" onclick="account_delete_confirm_modal('/account-deletion')" class="aiz-side-nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_25000" data-name="Group 25000" transform="translate(-240.535 -537)">
                                <path id="Path_2961" data-name="Path 2961" d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7" transform="translate(27.466 537)" fill="#b5b5bf"/>
                                <rect id="Rectangle_18942" data-name="Rectangle 18942" width="8" height="1" rx="0.5" transform="translate(244.535 544.5)" fill="#b5b5bf"/>
                                </g>
                            </svg>
                            <span class="aiz-side-nav-text ml-3">Delete My Account</span>
                        </a>
                    </li>
    
                </ul>
            
                <!-- logout -->
                <a href="" onclick="logout()" class="btn btn-primary btn-block fs-14 fw-700 mb-5 mb-md-0" style="border-radius: 25px;">Sign Out</a>
            </div>
    
        </div>
    </div>
            
        @endif
        <!-- User Side nav -->
    
            <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
            <div class="absolute-full bg-black opacity-60"></div>
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md">
                <div class="modal-content position-relative border-0 rounded-0">
                    <div class="aiz-editor-data">
                        <p><img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/dwaK3um8tkVgEsgmZN1peQb844tFRAIQ1wAS8e3z.png" style="width: 100%;"></p><p style="text-align: center; "><br></p><h2 style="text-align: center; "><b>Subscribe to Our Newsletter</b></h2><p style="text-align: center;">Subscribe our newsletter for coupon, offer and exciting promotional discount..</p>
                    </div>
                                            <div class="pb-5 pt-4 px-5">
                            <form class="" method="POST">
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
@if (isset($states))
@include('layouts.add-new-address-modal');
@endif

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
    <script src="/assets/js/vendors.js"></script>
    <script src="/assets/js/aiz-core.js"></script>



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
                    // console.log('it is hovered here');
                    // let sub_cat_id = 'sub-cat-menu-'+el.getAttribute('data-id');
                    // document.getElementById(sub_cat_id).innerHTML = `<h1>Hiii `+sub_cat_id+`</h1>`;
                    // let http_f = new XMLHttpRequest();
                    // http_f.open("GET", '/api/sub-categories', true);
                    // http_f.onreadystatechange = function() {
                    //     if(http_f.readyState == 4) {
                    //         let response = JSON.parse(this?.responseText);
                    //         if(http_f.status == 200) {
                                
                                
                    //             document.getElementById('wishlist-count-top').innerText = response.data.length
                    //         } else {
                    //             showAlert(response.message, 'alert-warning', []);
                    //         }
                    //     }
                    // }
                    // http_f.send();
                    // if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                    //     //$.post('https://demo.activeitzone.com/ecommerce/category/nav-element-list', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){
                    //         $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                    //     //});
                    // }
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
                $.post('/api/ajax-search', { search:searchKey}, function(data){
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

        // function addToCartff(){
        //                     AIZ.plugins.notify('warning', "Please Login as a customer to add products to the Cart.");
        //         return false;
            
        //     if(checkAddToCartValidity()) {
        //         $('#addToCart').modal();
        //         $('.c-preloader').show();
        //         $.ajax({
        //             type:"POST",
        //             url: 'https://demo.activeitzone.com/ecommerce/cart/addtocart',
        //             data: $('#option-choice-form').serializeArray(),
        //             success: function(data){

        //                $('#addToCart-modal-body').html(null);
        //                $('.c-preloader').hide();
        //                $('#modal-size').removeClass('modal-lg');
        //                $('#addToCart-modal-body').html(data.modal_view);
        //                AIZ.extra.plusMinus();
        //                AIZ.plugins.slickCarousel();
        //                updateNavCart(data.nav_cart_view,data.cart_count);
        //             }
        //         });
        //     }
        //     else{
        //         AIZ.plugins.notify('warning', "Please choose all the options");
        //     }
        // }

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