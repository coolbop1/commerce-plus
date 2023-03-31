@extends('layouts.delivery')
@section('content')
@include('layouts.delivery-top-bar')
@include('layouts.delivery-side-bar')
@include('layouts.delivery-user-nav')
@include('layouts.delivery-mobile-bottom-nav')
@include('layouts.delivery-panel-modal')
@php
    $page = 'picked_up';
@endphp
@include('layouts.delivery-content-assigned')
<!-- aiz-main-wrapper -->
<div class="aiz-main-wrapper d-flex flex-column bg-white">

    <!-- Header -->
    

<!-- Modal -->
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
        <div id="order-details-modal-body">

        </div>
    </div>
</div>
</div>

@yield('delivery-top-bar')
<!-- Content -->
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @yield('delivery-side-bar')
            
            @yield('delivery-content-assigned.blade')

        </div>
    </div>
</section>

@yield('delivery-moble-bottom-nav')   
@yield('deliver-user-nav')
</div>

@yield('delivery-panel-modal')


@endsection