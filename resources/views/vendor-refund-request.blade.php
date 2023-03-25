@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
{{-- @include('layouts.vendor-single-order-table') --}}
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
            <h1 class="h3">Refund Requests</h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header row gutters-5">
        <h5 class="mb-0 h6">All Refund Request</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="lg">Date</th>
                    <th>Order ID</th>
                    <th data-breakpoints="lg">Product</th>
                    <th data-breakpoints="lg">Amount</th>
                    <th data-breakpoints="lg">Status</th>
                    <th data-breakpoints="lg">Reason</th>
                    <th>Approval</th>
                    <th data-breakpoints="lg">Reject</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($refund_requests as $refund_request)
                @php
                    $num++;
                @endphp
                    <tr>
                        <td>{{ $num }}</td>
                        <td>{{ Carbon\Carbon::parse($refund_request->request_date)->format("d-m-Y") }}</td>
                        <td>{{ $refund_request->order->order_code }}</td>
                        <td>
                            {{ $refund_request->cart->product->name }}
                        </td>
                        <td>₦{{ $refund_request->cart->product->newPrice() }}</td>
                        <td>
                        @switch($refund_request->status)
                            @case('rejected')
                            <span class="badge badge-inline badge-danger"><strong>Rejected</strong></span>
                                @break
                            @case('approved')
                            <span class="badge badge-inline badge-success"><strong>Approved</strong></span>
                                @break
                        
                            @default
                            <span class="badge badge-inline badge-primary"><strong>Pending</strong></span>
                        @endswitch
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="refund_reject_reason_show('{{ $refund_request->refund_request_reason}}', 'Refund RequestReason')"><span class="badge badge-inline badge-success">Show</span></a>
                        </td>
                        <td>
                            @if ($refund_request->status != 'rejected')
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input @if ($refund_request->status == 'accepted')
                                        checked
                                    @endif onchange="update_refund_approval(this, {{ $refund_request->id }})" type="checkbox" >
                                    <span class="slider round"></span>
                                </label>
                            @endif
                        </td>
                        <td>
                            @if ($refund_request->status == 'rejected')
                                <a href="javascript:void(0);" onclick="refund_reject_reason_show('{{ $refund_request->rejected_reason}}')" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="Reject Reason">
                                    <i class="las la-eye"></i>
                                </a>
                            @endif 
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
















{{--  content end --}}

</div>
<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
    <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
</div>

<div class="modal fade reject_refund_request" id="modal-basic">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal member-block" action="https://demo.activeitzone.com/ecommerce/seller/reject-refund-request" method="POST">
            <input type="hidden" name="_token" value="YvVCyRz6j1KSfHkg0JlLGA8Ey2r7ZnRPRbKLppwZ">                <input type="hidden" name="refund_id" id="refund_id" value="">
            <div class="modal-header">
                <h5 class="modal-title h6">Reject Refund Request !</h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Reject Reason</label>
                    <div class="col-md-9">
                        <textarea type="text" name="reject_reason" rows="5" class="form-control" placeholder="Reject Reason" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade reject_reason_show_modal" id="modal-basic">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 id="clicked-modal-t" class="modal-title h6">Refund Request Reject Reason</h5>
              <button type="button" class="close" data-dismiss="modal"></button>
          </div>
          <div class="modal-body reject_reason_show">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<script type="text/javascript">

    // function update_refund_approval(el){
    //     $.post('https://demo.activeitzone.com/ecommerce/seller/refund-reuest-vendor-approval',{_token:'YvVCyRz6j1KSfHkg0JlLGA8Ey2r7ZnRPRbKLppwZ', el:el}, function(data){
    //         if (data == 1) {
    //             AIZ.plugins.notify('success', 'Approval has been done successfully');
    //         }
    //         else {
    //             AIZ.plugins.notify('danger', 'Something went wrong');
    //         }
    //     });
    // }

    function reject_refund_request(id) {
       $('.reject_refund_request').modal('show');
       $('#refund_id').val(id);
    }

    function refund_reject_reason_show(url, title = "Refund Request Reject Reason"){
            $('#clicked-modal-t').html(title);
             $('.reject_reason_show').html(url);
             $('.reject_reason_show_modal').modal('show');
    }
</script>
</div>
</div>
</div>
@endsection

