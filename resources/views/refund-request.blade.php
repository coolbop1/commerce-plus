@extends('layouts.app')
@include('layouts.buyer-side-bar')
@include('layouts.buyer-refund-request')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @yield('buyer-side-bar')
			<div class="aiz-user-panel">
                @yield('buyer-refund-request')
            
                <!-- Pagination -->
                <div class="aiz-pagination">
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection