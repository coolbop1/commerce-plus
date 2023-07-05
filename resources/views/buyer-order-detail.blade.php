@extends('layouts.app')
@include('layouts.buyer-side-bar')
@include('layouts.delivery-content-order-detail')
@include('layouts.track-container')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @yield('buyer-side-bar')
			<div class="aiz-user-panel">
                @yield('order-detail')
                @yield('track-container')
            
                <!-- Pagination -->
                <div class="aiz-pagination">
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection