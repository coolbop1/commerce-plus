@extends('layouts.app')
@include('layouts.buyer-side-bar')
@include('layouts.buyer-wish-list')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @yield('buyer-side-bar')
			<div class="aiz-user-panel">
				<div class="aiz-titlebar mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <b class="fs-20 fw-700 text-dark">Wishlist</b>
                        </div>
                    </div>
                </div>
                @yield('buyer-wish-list')
            
                <!-- Pagination -->
                <div class="aiz-pagination">
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection