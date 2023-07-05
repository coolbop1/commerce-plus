@section('delivery-content-assigned.blade')
<div class="aiz-user-panel">
    <div class="card shadow-none rounded-0 border">
        <div class="card-header border-bottom-0">
            <h5 class="mb-0 fs-20 fw-700 text-dark">{{ ucwords(str_replace('_', ' ',$page)) }} Delivery History</h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead class="text-gray fs-12">
                    <tr>
                        <th class="pl-0">Code</th>
                        @if ($page == 'delivered')
                        <th>Date</th>
                        @else
                        <th data-breakpoints="lg">Date</th>
                        @endif
                        
                        <th>Amount</th>
                        @if (in_array($page, ['assigned', 'picked_up', 'on_the_way', 'pending']))
                        <th data-breakpoints="lg">Delivery Status</th>
                        <th data-breakpoints="lg">Payment Status</th>
                        @if ($page != 'delivered')
                            @if ($delivery_boy->is_operator)
                                <th data-breakpoints="lg">Delivery Person</th>  
                            @else
                                <th data-breakpoints="lg">Payment Type</th>  
                            @endif 
                        @endif
                        @switch($page)
                            @case('assigned')
                            <th data-breakpoints="lg">Mark As Pickup</th>    
                                @break
                            @case('picked_up')
                            <th data-breakpoints="lg">Mark As On The Way</th>    
                                @break
                            @case('on_the_way')
                            <th data-breakpoints="lg">Mark As Delivered</th>    
                                @break
                            @case('pending')
                                @if ($delivery_boy->is_operator)
                                    <th data-breakpoints="lg">Assign Delivery Person</th> 
                                @else
                                    <th data-breakpoints="lg">Assign To Me</th> 
                                @endif   
                                @break
                        
                            @default
                        @endswitch
                            
                        @endif
                        
                        
                        <th class="text-right pr-0">Options</th>
                    </tr>
                </thead>
                <tbody class="fs-14">
                    
                    @foreach ($assigned_deliveries as $route_trail)
                    @php
                        $order_ = $route_trail->order;
                        $delivery = $order_->delivery;
                        $delivery = $delivery instanceof App\Models\CancelledDelivery ? $delivery->delivery : $delivery;
                    @endphp
                        <tr>
                            <!-- Code -->
                            <td class="pl-0" style="vertical-align: middle;">
                                <a href="/delivery-boy/order-detail/{{ $delivery->order->order_code }}">{{ $delivery->order->order_code }}</a>
                            </td>
                            <!-- Date -->
                            <td class="text-secondary" style="vertical-align: middle;">
                                {{ Carbon\Carbon::parse($delivery->updated_at)->format("d-m-Y H:m A") }}
                            </td>
                            <!-- Amount -->
                            <td class="fw-700" style="vertical-align: middle;">₦{{ $page == 'earnings' ? number_format($delivery->order->shipping , 2) : number_format($delivery->order->amount, 2) }}</td>
                            @if (in_array($page, ['assigned', 'picked_up', 'on_the_way', 'pending']))
                            <!-- Delivery Status -->
                            <td class="fw-700" style="vertical-align: middle;"> 
                                {{  ucwords(str_replace('_', ' ', $delivery->status)) }}
                                <span class="ml-1" style="color:green"><strong>*</strong></span>
                            </td>
                            <!-- Payment Status -->
                            <td class="fw-700 w-120px" style="vertical-align: middle;">
                                @switch($delivery->order->payment_status)
                                    @case('paid')
                                    <span class="badge badge-inline badge-success p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">Paid</span>
                                        @break
                                
                                    @default
                                    <span class="badge badge-inline badge-danger p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">UnPaid</span>
                                @endswitch
                                
                                <span class="ml-1" style="color:green"><strong>*</strong></span>
                            </td>
                            @if ($page != 'delivered')
                            <!-- Payment Type -->
                            <td class="w-120px" style="vertical-align: middle;">
                                @if ($delivery_boy->is_operator)
                                    {{ optional(optional(optional($route_trail)->deliveryBoy)->user)->name ?? '' }}   
                                @else
                                @switch($delivery->order->checkout->order_type)
                                    @case('cod')
                                        Cash On Delivery
                                        @break
                                    @case('card')
                                        Card
                                        @break
                                    @case('offline')
                                        Cash
                                        @break
                                
                                    @default
                                        
                                @endswitch
                                @endif
                            </td>  
                            @endif
                            
                            <!-- Switch -->
                            @switch($page)
                            @case('assigned')
                                <td style="vertical-align: middle;">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input @if ($route_trail->status == 'awaiting_delivery')
                                            disabled
                                            checked
                                        @endif onchange="return update_order_status(this,{{ $delivery->order->id }}, '/delivery/pickup-deliveries')" value="out_for_delivery" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>  
                                @break
                            @case('picked_up')
                                <td style="vertical-align: middle;">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input @if ($route_trail->status == 'awaiting_delivery')
                                            disabled
                                            checked
                                        @endif onchange="return update_delivery_status(this,{{ $route_trail->id }}, '/delivery/on-the-way-deliveries')" value="on_the_way" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>  
                                @break
                            @case('on_the_way')
                                <td style="vertical-align: middle;">
                                    @if (!$delivery_boy->is_operator)
                                        <input class="form-control" style="margin-bottom: 5px" type="password" placeholder="Delivery Code (POD)" id="pod_input" />
                                    @endif
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input @if ($route_trail->status == 'delivered')
                                            disabled
                                            checked
                                        @endif onchange="return update_delivery_status(this,{{ $route_trail->id }}, '/delivery/completed-deliveries')" value="delivered" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>  
                                @break
                            @case('pending')
                                <td style="vertical-align: middle;">
                                    @if ($delivery_boy->is_operator)
                                        <select onchange="return update_delivery_status(this,{{ $route_trail->id }}, '/delivery/assigned-deliveries')" class="form-control mb-3 aiz-selectpickers" data-live-search="true">
                                            <option value={{ null }}>Choose Delivery Person</option>
                                            @foreach ($delivery_boys as $deliveryBoy)
                                                <option value="{{ $deliveryBoy->id }}">{{ $deliveryBoy->user->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input @if ($delivery->status == 'delivered')
                                                disabled
                                                checked
                                            @endif onchange="return update_delivery_status(this,{{ $route_trail->id }}, '/delivery/assigned-deliveries')" value="assigned" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    @endif
                                </td>  
                                @break
                        
                            @default
                            @endswitch
                            @endif
                            
                            <td class="text-right pr-0 w-130px" style="vertical-align: middle;">
                                {{-- @if ($page != 'delivered' && $page != 'canceled') --}}
                                @if (in_array($page, ['assigned', 'picked_up', 'on_the_way', 'pending']))
                                    <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm" onclick="confirm_cancel_request('/delivery/cancel-request/{{ $delivery->id }}')" title="Cancel">
                                        <i class="las la-times"></i>
                                    </a>
                                @endif
                                
                                <a href="/delivery/order-detail/{{ $delivery->order->order_code }}" class="btn btn-soft-info btn-icon btn-circle btn-sm hov-svg-white" title="Order Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10">
                                        <g id="Group_24807" data-name="Group 24807" transform="translate(-1339 -422)">
                                            <rect id="Rectangle_18658" data-name="Rectangle 18658" width="12" height="1" transform="translate(1339 422)" fill="#3490f3"/>
                                            <rect id="Rectangle_18659" data-name="Rectangle 18659" width="12" height="1" transform="translate(1339 425)" fill="#3490f3"/>
                                            <rect id="Rectangle_18660" data-name="Rectangle 18660" width="12" height="1" transform="translate(1339 428)" fill="#3490f3"/>
                                            <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1339 431)" fill="#3490f3"/>
                                        </g>
                                    </svg>
                                </a>
                                <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="/delivery/invoice/{{ $delivery->order->id }}" title="Download Invoice">
                                    <i class="las la-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="aiz-pagination mt-2">
                
            </div>
        </div>

    </div>
</div>
@endsection