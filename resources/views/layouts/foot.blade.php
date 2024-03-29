@section('foots')
<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="/terms">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">Terms &amp; conditions</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="/return-policy">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">Return Policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="/support-policy">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">Support Policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="/privacy-policy">
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
                    <a href="/" class="d-block">
                        <img class="lazyload" src="/uploads/logo.png" alt="Active eCommerce CMS" height="44">
                    </a>
                    <div class="my-3">
                        <span style="color: rgb(242, 243, 248); font-family: 'Open Sans', sans-serif; background-color: rgb(17, 23, 35);">Complete system for your eCommerce business</span>
                    </div>
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="/subscribers">
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
                                <img src="/assets/img/play.png" class="mx-100 h-40px">
                            </a>
                            <a href="#" target="_blank" class="d-inline-block">
                                <img src="/assets/img/app.png" class="mx-100 h-40px">
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
                           <span class="d-block opacity-70">+234 700 CPLUSNG</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">Email:</span>
                           <span class="d-block opacity-70">
                               <a href="/cdn-cgi/l/email-protection#ff9b9a9290d19a879e928f939abf98929e9693d19c9092" class="text-reset"><span class="__cf_email__" data-cfemail="9bfffef6f4b5fee3faf6ebf7fedbfcf6faf2f7b5f8f4f6">support@commerceplus.com</span></a>
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
                                <a href="/seller-policy" class="opacity-50 hov-opacity-100 text-reset">
                                    Support Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="/return-policy" class="opacity-50 hov-opacity-100 text-reset">
                                    Return Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="/about-us" class="opacity-50 hov-opacity-100 text-reset">
                                    About Us
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="/privacy-policy" class="opacity-50 hov-opacity-100 text-reset">
                                    Privacy Policy Page
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="/sellerpolicy" class="opacity-50 hov-opacity-100 text-reset">
                                    Seller Policy
                                </a>
                            </li>
                                                        <li class="mb-2">
                                <a href="/terms" class="opacity-50 hov-opacity-100 text-reset">
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
                        <li id="footer-access" class="mb-2">
                            @if ($user)
                                <a style="cursor: pointer;"  class="opacity-50 hov-opacity-100 text-reset" onclick="return logout()">
                                    Logout
                                </a>
                            @else
                                <a class="opacity-50 hov-opacity-100 text-reset" href="login">
                                    Login
                                </a> 
                            @endif
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="/purchase_history">
                                Order History
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="/wishlists">
                                My Wishlist
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="/track-your-order">
                                Track Order
                            </a>
                        </li>
                                                    <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-light" href="/affiliate">Be an affiliate partner</a>
                            </li>
                                            </ul>
                </div>
                                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            Be a Seller
                        </h4>
                        <a href="create-shop" class="btn btn-primary btn-sm shadow-md">
                            Apply Now
                        </a>
                    </div>
                            </div>
        </div>
    </div>
</section>
@if (Request::is('checkout/payment_select') )
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>viewMyCart();</script>
@endif
@endsection
