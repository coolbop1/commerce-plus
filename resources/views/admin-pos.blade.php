@extends('layouts.admin')
@include('layouts.admin-side-bar-menu')
@include('layouts.admin-top-bar')
@include('layouts.vendor-pos-products')
@section('content')
<input id="pos-cart-store-id" value="{{ $store->id }}" >
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('admin-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('admin-top-bar')
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">






                    @yield('pos-products')





				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    

    <script src="{{ asset('assets/js/vendors.js') }}" ></script>
    <script src="{{ asset('assets/js/aiz-core.js') }}" ></script>
    @endsection