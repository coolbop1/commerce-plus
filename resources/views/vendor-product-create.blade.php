@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@include('layouts.vendor-products-list-card')
@include('layouts.vendor-product-form')
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">
{{-- content start   --}}






<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">Add Your Product</h1>
        </div>
    </div>
</div>

{{-- @yield('product-form-temp') --}}
@yield('product-form')






{{--  content end --}}

            </div>
            <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
                <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
            </div>
        </div>
        </div>
    </div>
@endsection