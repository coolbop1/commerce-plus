@section('buyer-purchase-history')
<div class="card shadow-none rounded-0 border">
    <div class="card-header border-bottom-0">
        <h5 class="mb-0 fs-20 fw-700 text-dark">Purchase History</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead class="text-gray fs-12">
                <tr>
                    <th class="pl-0">Code</th>
                    <th data-breakpoints="md">Date</th>
                    <th>Amount</th>
                    <th data-breakpoints="md">Delivery Status</th>
                    <th data-breakpoints="md">Payment Status</th>
                    <th class="text-right pr-0">Options</th>
                </tr>
            </thead>
            <tbody class="fs-14">
                @foreach ($orders as $order)
                    <tr>
                        <!-- Code -->
                        <td class="pl-0">
                            <a href="/purchase_history/details/{{ $order->order_code }}">{{ $order->order_code }}</a>
                        </td>
                        <!-- Date -->
                        <td class="text-secondary">{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                        <!-- Amount -->
                        <td class="fw-700">
                            ₦{{ number_format($order->amount, 2) }}
                        </td>
                        <!-- Delivery Status -->
                        <td class="fw-700">
                            {{ optional(optional($order)->delivery)->status ?? 'pending' }}
                        </td>
                        <!-- Payment Status -->
                        <td>
                            @if ($order->payment_status == 'paid')
                                <span class="badge badge-inline badge-success p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Paid</span>
                            @else
                                <span class="badge badge-inline badge-danger p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Unpaid</span>
                            @endif
                        </td>
                        <!-- Options -->
                        <td class="text-right pr-0">
                            <a href="/purchase_history/details/{{ $order->order_code }}" class="btn btn-soft-info btn-icon btn-circle btn-sm hov-svg-white" title="Order Details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10">
                                    <g id="Group_24807" data-name="Group 24807" transform="translate(-1339 -422)">
                                        <rect id="Rectangle_18658" data-name="Rectangle 18658" width="12" height="1" transform="translate(1339 422)" fill="#3490f3"/>
                                        <rect id="Rectangle_18659" data-name="Rectangle 18659" width="12" height="1" transform="translate(1339 425)" fill="#3490f3"/>
                                        <rect id="Rectangle_18660" data-name="Rectangle 18660" width="12" height="1" transform="translate(1339 428)" fill="#3490f3"/>
                                        <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1339 431)" fill="#3490f3"/>
                                    </g>
                                </svg>
                            </a>
                            <a class="btn btn-soft-warning btn-icon btn-circle btn-sm hov-svg-white" href="/invoice/{{ $order->id }}" title="Download Invoice">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12.001" viewBox="0 0 12 12.001">
                                    <g id="Group_24807" data-name="Group 24807" transform="translate(-1341 -424.999)">
                                    <path id="Union_17" data-name="Union 17" d="M13936.389,851.5l.707-.707,2.355,2.355V846h1v7.1l2.306-2.306.707.707-3.538,3.538Z" transform="translate(-12592.95 -421)" fill="#f3af3d"/>
                                    <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1341 436)" fill="#f3af3d"/>
                                    </g>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                                                                    
            </tbody>
        </table>
    </div>
</div>

@endsection