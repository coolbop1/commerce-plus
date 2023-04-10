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






<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
      <div class="col-md-6">
          <h1 class="h3">Money Withdraw</h1>
      </div>
    </div>
  </div>

  <div class="row gutters-10">
      <div class="col-md-4 mb-3 ml-auto" >
          <div class="bg-grad-1 text-white rounded-lg overflow-hidden">
            <span class="size-30px rounded-circle mx-auto bg-soft-primary d-flex align-items-center justify-content-center mt-3">
                <i class="las la-dollar-sign la-2x text-white"></i>
            </span>
            <div class="px-3 pt-3 pb-3">
                <div class="h4 fw-700 text-center">₦{{ number_format($store->balance,2) }}</div>
                <div class="opacity-50 text-center">Pending Balance</div>
            </div>
          </div>
      </div>
      <div class="col-md-4 mb-3 mr-auto" >
        <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition" onclick="show_request_modal()">
            <span class="size-60px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                <i class="las la-plus la-3x text-white"></i>
            </span>
            <div class="fs-18 text-primary">Send Withdraw Request</div>
        </div>
      </div>
  </div>




  <div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Withdraw request history</h5>
    </div>
      <div class="card-body">
          <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th data-breakpoints="lg">Status</th>
                      <th data-breakpoints="lg" width="60%">Message</th>
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
                    <td>
                        @switch($payement_request->status)
                            @case('pending')
                            <span class=" badge badge-inline badge-info" >Pending</span>
                                @break
                        
                            @default
                            <span class=" badge badge-inline badge-success" >Paid</span>
                        @endswitch
                        </td>
                        <td>{{ $payement_request->request_messag }}</td>
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
<div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send A Withdraw Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
             
                <form class="" onsubmit="return submitForm(this, url = '/api/store-withdrawal-request/{{ $store->id }}', 'POST', 'withdrawal-request-button')">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Amount <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control mb-3" name="amount" min="1" max="{{ $store->balance }}" placeholder="Amount" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Message</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button id="withdrawal-request-button" type="submit" class="btn btn-sm btn-primary">Send</button>
                        </div>
                    </div>
                </form>
                        </div>
    </div>
</div>


<script type="text/javascript">
    function show_request_modal(){
        $('#request_modal').modal('show');
    }

    function show_message_modal(message){
        $('#message_modal .modal-content').html(message);
        $('#message_modal').modal('show', {backdrop: 'static'});
    }
</script>


@endsection

