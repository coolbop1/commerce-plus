<div class="row">
    <div class="col-xl-6">
        <ul id="o_confirmation_list" class="list-group list-group-flush">
            @foreach ($carts as $cart)
            <li class="list-group-item py-0 pl-2">
                <div class="row gutters-5 align-items-center">
                    <div class="col-auto w-60px">
                        <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                            

                            <button
                                onclick="addToCartV2({{ $cart->product_id }}, 'pos')"
                                class="btn col-auto btn-icon btn-sm fs-15"
                                type="button" data-type="plus"
                                >
                                <i class="las la-plus"></i>
                            </button>
                            <input type="number"
                                class="col border-0 text-center flex-grow-1 fs-16 input-number"
                                placeholder="1" value="{{ $cart->qty }}"
                                min="{{ $cart->product->min_qty }}"
                                onchange="addToCartV2({{ $cart->product_id }}, 'pos', this.value)">
                            <button
                                onclick="removeFromCartV2({{ $cart->product_id }}, 'pos')"
                                class="btn col-auto btn-icon btn-sm fs-15"
                                type="button" data-type="minus"
                                >
                                <i class="las la-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-truncate-2">{{ $cart->product->name }}</div>
                        <span class="span badge badge-inline fs-12 badge-soft-secondary"></span>
                    </div>
                    <div class="col-auto">
                        <div class="fs-12 opacity-60">₦{{ $cart->product->newprice }} x {{ $cart->qty }}</div>
                        <div class="fs-15 fw-600">₦{{ ($cart->product->newprice *  $cart->qty) }}</div>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-circle btn-icon btn-sm btn-soft-danger ml-2 mr-0" onclick="removeFromCartV2({{ $cart->product_id }}, 'pos', true)">
                            <i class="las la-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @php
        $cart = $carts->first();
    @endphp
    <div class="col-xl-6">
        <div class="pl-xl-4">
            <div class="card mb-4">
                <div class="card-header"><span class="fs-16">Customer Info</span></div>
                <div id="customer-info-card" class="card-body">
                    @if (is_null($cart->customer_id))
                        <div class="text-center p-4">
                            No customer information selected.
                        </div>
                    @else
                    @php
                        $customer = $cart->customer;
                    @endphp
                    <div class="d-flex justify-content-between  mb-2">
                        <span class="">Name:</span>
                        <span class="fw-600">{{ $customer->customer_name }}</span>
                    </div>
                    <div class="d-flex justify-content-between  mb-2">
                        <span class="">Phone:</span>
                        <span class="fw-600">{{ $customer->phone }}</span>
                    </div>
                    <div class="d-flex justify-content-between  mb-2">
                        <span class="">State:</span>
                        <span class="fw-600">{{ $customer->state->name }}</span>
                    </div>
                    <div class="d-flex justify-content-between  mb-2">
                        <span class="">Local Government:</span>
                        <span class="fw-600">{{ $customer->lga->name }}</span>
                    </div>
                    <div class="d-flex justify-content-between  mb-2">
                        <span class="">Address:</span>
                        <span class="fw-600">{{ $customer->address }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Total</span>
                <span>₦{{ $total_price }}</span>
            </div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Tax</span>
                <span>₦0.000</span>
            </div>
            <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Shipping</span>
                <span>₦{{ $shipping }}</span>
            </div>
            {{-- <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                <span>Discount</span>
                <span>₦0.000</span>
            </div> --}}
            <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
                <span>Total</span>
                <span>₦{{ $total_amount }}</span>
            </div>
        </div>
    </div>
</div>