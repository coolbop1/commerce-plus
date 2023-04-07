
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

    <meta name="csrf-token" content="P54hNJtbnPpNjyx9nY1tneWSGkmotlKPs4rLaJjl">
    <meta name="app-url" content="">
    <meta name="file-base-url" content="">

    <title>Active eCommerce | Demo of Active eCommerce CMS</title>

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
                        @endif
                        @if ($role == 'ROLE_SUPERADMIN')
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/admin" class="text-reset d-inline-block opacity-60 py-2">Admin Dashboard</a>
                            </li>
                        @endif
                        @if ($role == 'ROLE_DELIVERY')
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="/delivery/dashboard" class="text-reset d-inline-block opacity-60 py-2">Delivery Dashboard</a>
                            </li>
                        @endif
                        <li class="list-inline-item">
                            <a style="cursor: pointer;" onclick="return logout()" class="text-reset d-inline-block opacity-60 py-2">Logout</a>
                        </li>
                    </ul>
                @else
                    <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">    
                        <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                            <a href="login" class="text-reset d-inline-block opacity-60 py-2">Login</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="register" class="text-reset d-inline-block opacity-60 py-2">Registration</a>
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
                        <a href="flash-deals" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Flash Sale
                        </a>
                    </li>
                    {{-- <li class="list-inline-item mr-0">
                        <a href="https://demo.activeitzone.com/ecommerce/blog" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            Blogs
                        </a>
                    </li> --}}
                    <li class="list-inline-item mr-0">
                        <a href="brands" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Brands
                        </a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="/categories" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            All Categories
                        </a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="sellers" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
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
            <a href="categories" class="text-reset d-block text-center pb-2 pt-3">
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
                            //
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