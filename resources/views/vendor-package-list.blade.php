@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@include('layouts.vendor-products-review-card')
{{-- @include('layouts.vendor-product-form')  --}}
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
            <h1 class="h3">Purchase Package List</h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header row gutters-5">
        <div class="col">
            <h5 class="mb-md-0 h6">All Purchase Package</h5>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="30%">Package</th>
                    <th data-breakpoints="md">Package Price</th>
                    <th data-breakpoints="md">Payment Type</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($store->subscriptions as $key => $subscription) 
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $subscription->package->name }}</td>
                        <td>{{ $subscription->subscription_amount }}</td>
                        <td>{{ $subscription->payment_type != 'offline' ? "Online payment" : "Offline payment" }}</td>
                    </tr>
                @endforeach
                  
            </tbody>
        </table>
        <div class="aiz-pagination">
            
          </div>
    </div>
</div>










{{--  content end --}}

</div>
<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
    <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
</div>
</div>
</div>
</div>
@endsection

