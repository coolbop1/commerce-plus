@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@include('layouts.vendor-products-list-card')
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">

                <div class="aiz-titlebar mt-2 mb-4">
                    <div class="row align-items-center">
                      <div class="col-md-6">
                          <h1 class="h3">Products</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row gutters-10 justify-content-center">
                    <div class="col-md-4 mx-auto mb-3" >
                        <div class="bg-grad-1 text-white rounded-lg overflow-hidden">
                        <span class="size-30px rounded-circle mx-auto bg-soft-primary d-flex align-items-center justify-content-center mt-3">
                            <i class="las la-upload la-2x text-white"></i>
                        </span>
                        <div class="px-3 pt-3 pb-3">
                            <div class="h4 fw-700 text-center">{{ $remaining_uploads ?? 500 }}</div>
                            <div class="opacity-50 text-center">Remaining Uploads</div>
                        </div>
                        </div>
                    </div>
        
                    <div class="col-md-4 mx-auto mb-3" >
                        <a href="{{ $page == 'digitalproducts' ? '/seller/digitalproducts/create' : '/seller/product/create' }}">
                        <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition">
                            <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                                <i class="las la-plus la-3x text-white"></i>
                            </span>
                            <div class="fs-18 text-primary">{{ $page == 'digitalproducts' ? 'Add New Digital Product' : 'Add New Product' }}</div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="https://demo.activeitzone.com/ecommerce/seller/seller-packages" class="text-center bg-white shadow-sm hov-shadow-lg text-center d-block p-3 rounded">
                            <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/Sc9fsDKcoJQX4qqizGA9XiP4UtvOVfFvnZQxUmQ4.png" height="44" class="mw-100 mx-auto">
                            <span class="d-block sub-title mb-2">Current Package: Platinum</span>
                            <div class="btn btn-outline-primary py-1">Upgrade Package</div>
                        </a>
                    </div>
                </div>
              
                {{-- @yield('product-list-card-temp') --}}
                @yield('product-list-card')




            </div>
            <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
                <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
            </div>
        </div>
        </div>
    </div>
@endsection