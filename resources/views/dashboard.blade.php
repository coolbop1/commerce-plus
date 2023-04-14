@extends('layouts.app')
@include('layouts.buyer-side-bar')
@include('layouts.buyer-dashboard')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @yield('buyer-side-bar')
			<div class="aiz-user-panel">
				@yield('buyer-dashboard')
            
                <!-- Pagination -->
                <div class="aiz-pagination">
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection