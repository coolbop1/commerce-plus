@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
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


<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Payment History</h5>
    </div>

    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Payment method</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($payement_requests as $payement_request)
                @php
                    $num++;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ Carbon\Carbon::parse($payement_request->payment_date)->format("d-m-Y") }}</td>
                    <td>₦{{ $payement_request->amount }}</td>
                    <td>{{ $payement_request->payment_method }}</td>
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

