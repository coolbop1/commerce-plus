@extends('layouts.admin')
@include('layouts.admin-side-bar-menu')
@include('layouts.admin-top-bar')
@include('layouts.admin-add-hub-form')
@section('content')
<input id="pos-cart-store-id" value="{{ optional($store)->id }}" >
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('admin-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('admin-top-bar')
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">


                    @yield('add-hub-form')



				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
				</div>
			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    

    <script src="{{ asset('assets/js/vendors.js') }}" ></script>
    <script src="{{ asset('assets/js/aiz-core.js') }}" ></script>
	<div id="delete-modal" class="modal fade">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title h6">Delete Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body text-center">
					<p class="mt-1">Are you sure to delete this?</p>
					<button type="button" class="btn btn-link mt-2" data-dismiss="modal">Cancel</button>
					<a href="" id="delete-link" class="btn btn-primary mt-2 confirm-link">Delete</a>
				</div>
			</div>
		</div>
	</div><!-- /.modal -->
	@include('aiz-uploader');
	@if (isset($packages))
	@include('payment-option-modal');
	@endif
	{{-- @if (isset($states))
		@include('confirm-order-modal')   
	@endif --}}
    @endsection
	<!-- delete Modal -->