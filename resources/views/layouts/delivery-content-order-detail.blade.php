@section('order-detail')
                            <!-- Order id -->
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fs-20 fw-700 text-dark">Order ID: {{ $order->order_code }}</h1>
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="card shadow-none rounded-0 border mt-4">
        <div class="card-header border-bottom-0">
            <b class="fs-16 fw-700 text-dark">Order Summary</b> (seller phone: {{ $order->store->shop_phone }})
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600">Order Code::</td>
                            <td>{{ $order->order_code }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Customer:</td>
                            <td>{{ ucwords(optional(optional(optional($order)->checkout)->customer)->customer_name) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Phone:</td>
                                                            <td><a href="#" >{{ $order->checkout->phone ?? null }}</td>
                                                    </tr>
                        <tr>
                            <td class="w-50 fw-600">Shipping address:</td>
                            @if (optional(optional($order)->checkout)->hub_id)
                            <td>Pickup Station: {{ optional(optional($order)->checkout)->station->address }} , Phone: {{ optional(optional($order)->checkout)->station->phone }}</td>
                            @else
                            <td>{{ optional(optional(optional($order)->checkout)->customer)->address }}, {{ optional(optional(optional(optional($order)->checkout)->customer)->state)->name }}, Nigeria</td>
                            @endif
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600">Order date:</td>
                            <td> {{ Carbon\Carbon::parse($order->updated_at)->format("d-m-Y H:m A") }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Order status:</td>
                            <td>{{ ucwords(str_replace('_', ' ', $order->status)) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Total order amount:</td>
                            <td>₦{{ number_format($order->amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Shipping:</td>
                            <td>₦{{ number_format($order->shipping, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Payment method:</td>
                            <td>
                                @switch($order->checkout->order_type)
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
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card mt-4 shadow-none rounded-0 border">
                <div class="card-header border-bottom-0">
                    <b class="fs-16 fw-700 text-dark">Order Details</b>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-borderless table-responsive">
                        <thead class="text-gray fs-12">
                            <tr>
                                <th class="pl-0">#</th>
                                <th width="30%">Product</th>
                                {{-- <th>Variation</th> --}}
                                <th>Qty</th>
                                <th>Delivery Type</th>
                                <th class="text-right pr-0">Price</th>
                            </tr>
                        </thead>
                        <tbody class="fs-14">
                            @php
                                $num = 0;
                            @endphp
                            @foreach ($order->orderCarts() as $cart)
                            @php
                                $num++;
                            @endphp
                            <tr>
                                <td class="pl-0">{{ $num }}</td>
                                <td>
                                    <a href="/product/{{ str_replace(' ', '-', $cart->product->name) }}" target="_blank">{{ $cart->product->name }}</a>
                                </td>
                                {{-- <td>
                                        
                                </td> --}}
                                <td>
                                    {{ $cart->qty }}
                                </td>
                                <td>
                                </td>
                                <td class="text-right pr-0 fw-700">₦{{ number_format($cart->product->newPrice() , 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    <!-- Order Ammount -->
    <div class="col-lg-4">
        <div class="card mt-4 shadow-none rounded-0 border">
            <div class="card-header border-bottom-0">
                <b class="fs-16 fw-700 text-dark">Order Amount</b>
            </div>
            <div class="card-body pb-0">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="w-50 fw-600">Subtotal</td>
                            <td class="text-right">
                                <span class="strong-600">₦{{ number_format($order->amount, 2) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Shipping</td>
                            <td class="text-right">
                                <span class="text-italic">₦{{ number_format($order->shipping, 2) }}</span>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td class="w-50 fw-600">Tax</td>
                            <td class="text-right">
                                <span class="text-italic">₦{{ number_format($order->tax, 2) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600">Coupon</td>
                            <td class="text-right">
                                <span class="text-italic">₦{{ number_format($order->coupon, 2) }}</span>
                            </td>
                        </tr> --}}
                        <tr>
                            <td class="w-50 fw-600">Total</td>
                            <td class="text-right">
                                @php
                                    $total = $order->amount + $order->shipping + $order->tax + $order->coupon;
                                @endphp
                                <strong><span>₦{{ number_format($total, 2) }}</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection