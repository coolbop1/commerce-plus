@php
    //session_start();
@endphp
@extends('layouts.app')
@include('layouts.feature-products')
@include('layouts.new-arrivals-products')
@section('content')
<section class="pt-5 mb-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="d-flex justify-content-center">
                    @if ($store->shop_logo)
                        <img height="70" class=" lazyloaded" src="/{{ $store->shop_logo }}" data-src="/{{ $store->shop_logo }}" alt="{{ $store->name }}">
                    @else
                    <img height="70" class=" lazyloaded" src="/uploads/store_logo_placeholder.png" data-src="/{{ $store->shop_logo }}" alt="{{ $store->name }}">
                    @endif
                    <div class="pl-4 text-left">
                        <h1 class="fw-600 h4 mb-0">{{ $store->name }}
                        <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                                        </h1>
                        <div class="rating rating-sm mb-1">
                            <i class="las la-star {{ $ratings >= 1 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 2 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 3 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 4 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 5 ? 'active' : '' }}"></i>
                        </div>
                        <div class="location opacity-60">{{ $store->shop_address }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom mt-5"></div>
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-0">
                <ul class="list-inline mb-0 text-center text-lg-left">
                    <li class="list-inline-item ">
                        <a class="text-reset d-inline-block fw-600 fs-15 p-3  border-bottom border-primary border-width-2 " href="https://demo.activeitzone.com/ecommerce/shop/Filon-Asset-Store-2">Store Home</a>
                    </li>
                    <li class="list-inline-item ">
                        <a class="text-reset d-inline-block fw-600 fs-15 p-3 " href="https://demo.activeitzone.com/ecommerce/shop/Filon-Asset-Store-2/top-selling">Top Selling</a>
                    </li>
                    <li class="list-inline-item ">
                        <a class="text-reset d-inline-block fw-600 fs-15 p-3 " href="https://demo.activeitzone.com/ecommerce/shop/Filon-Asset-Store-2/all-products">All Products</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 order-1 order-lg-0">
                <ul class="text-center text-lg-right mt-4 mt-lg-0 social colored list-inline mb-0">
                                                                                                                                        </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-5">
    <div class="container">
        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
            @php
                $banner_string = $store->banner;
                $banners = $banner_string ? explode(',',$banner_string) : [];
            @endphp
            @foreach ($banners as $key => $banner)
            <div class="carousel-box">
                <img class="d-block w-100 lazyload rounded h-200px h-lg-380px img-fit" src="/{{ $banner }}" data-src="/{{ $banner }}" alt="{{ $key }} offer">
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- @yield('featured-products-temp') --}}
@yield('featured-products')
{{-- @yield('new-arrivals-products-temp') --}}
@yield('new-arrivals-products')




@endsection