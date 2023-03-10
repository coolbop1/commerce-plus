@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@include('layouts.vendor-products-review-card')
{{-- @include('layouts.vendor-product-form')  --}}
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">
{{-- content start   --}}







<section class="py-8 bg-soft-primary">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto text-center">
                <h1 class="mb-0 fw-700">Premium Packages for Sellers</h1>
            </div>
        </div>
    </div>
</section>

<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 gutters-10 justify-content-center">
                                <div class="col">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <img class="mw-100 mx-auto mb-4" src="{{ asset('assets/img/silver.png') }}" height="100">
                                <h5 class="mb-3 h5 fw-600">Silver</h5>
                            </div>
                            <ul class="list-group list-group-raw fs-15 mb-5">
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    100 Product Upload Limit
                                </li>
                            </ul>
                            <div class="mb-5 d-flex align-items-center justify-content-center">
                                                                        <span class="fs-30 fw-600 lh-1 mb-0">₦5,000.000</span>
                                                                    <span class="text-secondary border-left ml-2 pl-2">90<br>Days</span>
                            </div>

                            <div class="text-center">
                                                                                                                    <button class="btn btn-primary fw-600" onclick="select_payment_type(4)">Purchase Package</button>
                                                                                                        </div>
                        </div>
                    </div>
                </div>
                                <div class="col">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <img class="mw-100 mx-auto mb-4" src="{{ asset('assets/img/gold.png') }}" height="100">
                                <h5 class="mb-3 h5 fw-600">Gold</h5>
                            </div>
                            <ul class="list-group list-group-raw fs-15 mb-5">
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    200 Product Upload Limit
                                </li>
                            </ul>
                            <div class="mb-5 d-flex align-items-center justify-content-center">
                                                                        <span class="fs-30 fw-600 lh-1 mb-0">₦10,000.000</span>
                                                                    <span class="text-secondary border-left ml-2 pl-2">240<br>Days</span>
                            </div>

                            <div class="text-center">
                                                                                                                    <button class="btn btn-primary fw-600" onclick="select_payment_type(5)">Purchase Package</button>
                                                                                                        </div>
                        </div>
                    </div>
                </div>
                                <div class="col">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <img class="mw-100 mx-auto mb-4" src="{{ asset('assets/img/platinum.png') }}" height="100">
                                <h5 class="mb-3 h5 fw-600">Platinum</h5>
                            </div>
                            <ul class="list-group list-group-raw fs-15 mb-5">
                                <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    500 Product Upload Limit
                                </li>
                            </ul>
                            <div class="mb-5 d-flex align-items-center justify-content-center">
                                                                        <span class="fs-30 fw-600 lh-1 mb-0">₦15,000.000</span>
                                                                    <span class="text-secondary border-left ml-2 pl-2">365<br>Days</span>
                            </div>

                            <div class="text-center">
                                                                                                                    <button class="btn btn-primary fw-600" onclick="select_payment_type(6)">Purchase Package</button>
                                                                                                        </div>
                        </div>
                    </div>
                </div>
                        </div>
    </div>
</section>











{{--  content end --}}

</div>
<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
    <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
</div>
</div>
</div>
</div>
@endsection



