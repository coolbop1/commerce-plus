@section('buyer-refund-request')
<div class="card rounded-0 shadow-none border">
    <div class="card-header border-bottom-0">
        <h5 class="mb-0 fs-20 fw-700 text-dark">Applied Refund Requests</h5>
    </div>
    <div class="card-body py-0">
        <table class="table aiz-table mb-0">
            <thead class="text-gray fs-12">
                <tr>
                  <th class="pl-0">#</th>
                  <th data-breakpoints="lg">Date</th>
                  <th>Code</th>
                  <th data-breakpoints="lg">Product</th>
                  <th data-breakpoints="lg">Amount</th>
                  <th class="text-right pr-0 w-140px">Status</th>
                </tr>
            </thead>
            <tbody class="fs-14">

                @foreach ($refundRequests as $key => $refundRequest)
                @php
                    $order = $refundRequest->order; 
                    $cart = $refundRequest->cart;
                @endphp
                    <tr>
                        <td class="pl-0 text-dark" style="vertical-align: middle;">{{ $key + 1 }}</td>
                        <td class="text-secondary" style="vertical-align: middle;">{{ Carbon\Carbon::parse($refundRequest->created_at)->format('d-m-Y') }}</td>
                        <td style="vertical-align: middle;">
                         <a href="/purchase_history/details/{{ $order->order_code }}" class="fw-700 text-primary">{{ $order->order_code }}</a>
                                                                        </td>
                        <td style="vertical-align: middle;">{{ $cart->product->name }}</td>
                        <td class="fw-700" style="vertical-align: middle;">
                            ₦{{ number_format($cart->product->newprice, 2) }}
                                                                    </td>
                        <td class="text-right pr-0" style="vertical-align: middle;">
                            @if ($refundRequest->rejected_reason)
                            <a href="javascript:void(0);" onclick="refund_reject_reason_show('{{ $refundRequest->rejected_reason }}')" class="btn btn-soft-primary hov-svg-white btn-icon btn-circle btn-sm" title="Reject Reason">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12.004" height="11.001" viewBox="0 0 12.004 11.001">
                                    <g id="Group_24939" data-name="Group 24939" transform="translate(-1336.909 -418.5)">
                                        <path id="Intersection_8" data-name="Intersection 8" d="M9246.738,757.5a5.908,5.908,0,0,0-9.655,0h-1.174a6.9,6.9,0,0,1,12,0Z" transform="translate(-7899 -335.501)" fill="#d43533"/>
                                        <path id="Intersection_9" data-name="Intersection 9" d="M0,0H1.176A5.91,5.91,0,0,0,6,2.5,5.91,5.91,0,0,0,10.828,0H12A6.9,6.9,0,0,1,6,3.5,6.9,6.9,0,0,1,0,0Z" transform="translate(1336.909 426)" fill="#d43533"/>
                                        <rect id="Rectangle_18880" data-name="Rectangle 18880" width="4" height="4" rx="2" transform="translate(1341 422)" fill="#d43533"/>
                                    </g>
                                </svg>
                                </a>
                            @endif
                                        
                            @switch($refundRequest->status)
                                @case('pending')
                                    <span class="badge badge-inline badge-warning p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Pending</span>
                                    @break
                                @case('rejected')
                                    <span class="badge badge-inline badge-danger p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Rejected</span>
                                    @break
                            
                                @default
                                <span class="badge badge-inline badge-success p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Accepted</span>
                                    
                            @endswitch
                                
                                                                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

<div class="modal fade reject_reason_show_modal" id="modal-basic">
	<div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title h6">Refund Request Reject Reason</h5>
              <button type="button" class="close" data-dismiss="modal"></button>
          </div>
          <div class="modal-body reject_reason_show">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Close</button>
          </div>
      </div>
	</div>
</div>
<script type="text/javascript">
    function refund_reject_reason_show(data){
        $('.reject_reason_show').html(data);
        $('.reject_reason_show_modal').modal('show');
    }
  </script>
  
@endsection