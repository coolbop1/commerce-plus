@section('order-table')
<div class="card">
    <div class="card-header">
        <h1 class="h2 fs-16 mb-0">Order Details</h1>
    </div>

    <div class="card-body">
        <div class="row gutters-5">
            <div class="col text-md-left text-center">
                @php
                    $delivery_status = $order->status;
                    $payment_status = $order->payment_status;
                @endphp
            </div>
            <div class="col-md-3 ml-auto">
                <label for="update_payment_status">Payment Status</label>
                @if ($order->payment_type == 'cod' && $payment_status == 'unpaid')
                    <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity"
                        id="update_payment_status">
                        <option value="unpaid" @if ($payment_status == 'unpaid') selected @endif>
                            Unpaid</option>
                        <option value="paid" @if ($payment_status == 'paid') selected @endif>
                            Paid</option>
                    </select>
                @else
                    <input type="text" class="form-control" value="{{ $payment_status }}" disabled>
                @endif
            </div>
            <div class="col-md-3 ml-auto">
                <label for="update_delivery_status">Delivery Status</label>
                @if ($delivery_status != 'delivered' && $delivery_status != 'cancelled')
                    <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity" id="update_delivery_status">
                        <option value="pending" @if ($delivery_status == 'pending') selected @endif>
                            Pending</option>
                        <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>
                            Confirmed</option>
                        <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>
                            Picked Up</option>
                        <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>
                            On The Way</option>
                        <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>
                            Delivered</option>
                        <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>
                            Cancel</option>
                    </select>
                @else
                    <input type="text" class="form-control" value="{{ $delivery_status }}" disabled>
                @endif
            </div>
        </div>
        <div class="row gutters-5 mt-2">
            <div class="col text-md-left text-center">
                                        <address>
                        <strong class="text-main">
                            {{ Str::ucfirst($order->checkout->customer->customer_name)  }}
                        </strong><br>
                        <a href="" class="__cf_email__" >{{ $order->checkout->customer->email ?? null }}</a><br>
                        {{ $order->checkout->customer->phone }}<br>
                        {{ $order->checkout->customer->postal_code ?? null }}
{{ $order->checkout->customer->address }},  {{ $order->checkout->customer->state->name }}<br>
                        Nigeria
                    </address>
                                                    </div>
            <div class="col-md-4 ml-auto">
                <table>
                    <tbody>
                        <tr>
                            <td class="text-main text-bold">Order #</td>
                            <td class="text-info text-bold text-right">{{ $order->order_code }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order status</td>
                            <td class="text-right">
                                @if ($order->status == 'delivered')
                                <span class="badge badge-inline badge-success">{{ $order->status }}</span>
                                @elseif ($order->status == 'pending')
                                <span class="badge badge-inline badge-info">{{ $order->status }}</span>
                                @else
                                <span class="badge badge-inline badge-danger">{{ $order->status }}</span>
                                @endif
                            
                                                                </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order date</td>
                            <td class="text-right">{{ Carbon\Carbon::parse($order->created_at)->format("d-m-Y") }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Total amount</td>
                            <td class="text-right">
                                ₦{{ $order->amount }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Payment method</td>
                            @php
							switch ($order->checkout->order_type) {
								case 'cod':
									$payment_method = 'Cash On Delivery';
									break;
								case 'offline':
									$payment_method = 'Cash';
									break;
								
								default:
									$payment_method = ucwords($order->checkout->order_type);
									break;
							}
						@endphp
                            <td class="text-right">
                                {{ $payment_method }}</td>
                        </tr>

                        <tr>
                            <td class="text-main text-bold">Additional Info</td>
                            <td class="text-right">{{ $order->checkout->customer->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>




        <hr class="new-section-sm bord-no">
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table-bordered aiz-table invoice-summary table">
                        <thead>
                            <tr class="bg-trans-dark">
                                <th data-breakpoints="lg" class="min-col">#</th>
                                <th width="10%">Photo</th>
                                <th class="text-uppercase">Description</th>
                                <th data-breakpoints="lg" class="text-uppercase">Delivery Type</th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-center">
                                    Qty
                                </th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-center">
                                    Price</th>
                                <th data-breakpoints="lg" class="min-col text-uppercase text-right">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $carts = $order->orderCarts();
                                $num  = 0;
                            @endphp

                            @foreach ($carts as $cart)
                                @php
                                    $num++;
                                    $product_name_slug = str_replace(' ', '-', $cart->product->name); 
                                @endphp
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>
                                        <a href="/product/{{ $product_name_slug }}" target="_blank"><img height="50" src="/{{ $cart->product->thumbnail_img }}"></a>
                                    </td>
                                    <td>
                                        <strong><a href="/product/{{ $product_name_slug }}" target="_blank"  class="text-muted">{{ $cart->product->detail }}</a></strong><small></small>
                                    </td>
                                    <td>
                                        Home Delivery
                                    </td>
                                    <td class="text-center">{{ $cart->qty }}</td>
                                    <td class="text-center">₦{{ $cart->product->newPrice() }}</td>
                                    <td class="text-center">₦{{ $cart->product->newPrice() * $cart->qty}}</td>
                                </tr>
                            @endforeach
                                         
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clearfix float-right">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <strong class="text-muted">Sub Total :</strong>
                            </td>
                            <td>
                                ₦{{ $order->amount }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">Tax :</strong>
                            </td>
                            <td>
                                ₦{{ $order->tax ?? 0 }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">Shipping :</strong>
                            </td>
                            <td>
                                ₦{{ $order->shipping ?? 0 }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">Coupon :</strong>
                            </td>
                            <td>
                                ₦{{ $order->coupon ?? null  }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">Total :</strong>
                            </td>
                            <td class="text-muted h5">
                                ₦{{ $order->amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="no-print text-right">
                    <a href="/seller/invoice/{{ $order->id }}" type="button"
                        class="btn btn-icon btn-light"><i class="las la-print"></i></a>
                </div>
            </div>







    </div>
@endsection