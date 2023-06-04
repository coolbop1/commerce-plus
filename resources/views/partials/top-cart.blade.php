<div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
    <ul id="cart-item-list-top" class="list-group list-group-flush">
        @foreach ($carts as $cart)
        <li class="list-group-item py-0 pl-2">
            <div class="row gutters-5 align-items-center">
                <div class="col-auto w-60px">
                    <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                        <button onclick="addToCartV2({{ $cart->product_id }})" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="plus" data-field="qty-0">
                            <i class="las la-plus"></i>
                        </button>
                        <input type="number" name="qty-0" id="qty-0" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $cart->qty }}" min="{{ $cart->product->min_qty }}" max="{{ $cart->product->quantity }}" onchange="addToCartV2({{ $cart->product_id }}, 'online', this.value)">
                        <button onclick="removeFromCartV2({{ $cart->product_id }})" class="btn col-auto btn-icon btn-sm fs-15" type="button" data-type="minus" data-field="qty-0">
                            <i class="las la-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="text-truncate-2">{{ $cart->product->name }}</div>
                    <span class="span badge badge-inline fs-12 badge-soft-secondary"></span>
                </div>
                <div class="col-auto">
                    <div class="fs-12 opacity-60">₦{{ number_format($cart->product->newprice, 2) ." x ".$cart->qty }}</div>
                    <div class="fs-15 fw-600">₦{{ number_format(($cart->product->newprice * $cart->qty), 2) }}</div>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-circle btn-icon btn-sm btn-soft-danger ml-2 mr-0" onclick="removeFromCartV2({{ $cart->product_id }}, 'online', true)">
                        <i class="las la-trash-alt"></i>
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div>
    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
        <span>Sub Total</span>
        <span>₦{{ number_format($total_price, 2) }}</span>
    </div>
    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
        <span>Tax</span>
        <span>₦0.000</span>
    </div>
    @if (isset($shipping))
    @php
        $total_price += $shipping ?? 0;
    @endphp
    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
        <span>Shipping</span>
        <span>₦{{ number_format($shipping, 2) }}</span>
    </div>
    @endif
    
    {{-- <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
        <span>Discount</span>
        <span>₦0.000</span>
    </div> --}}
    <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
        <span>Total</span>
        <span>₦{{ number_format($total_price, 2) }}</span>
    </div>
    <div class="py-3 text-center border-top mx-4" style="border-color: #e5e5e5 !important;">
        <div class="row gutters-10 justify-content-center">
            <div class="col-sm-6 mb-2">
                <a href="/cart" class="btn btn-warning btn-sm btn-block rounded-4 text-white">
                    View cart
                </a>
            </div>
            <div class="col-sm-6">
                <a href="/checkout" class="btn btn-primary btn-sm btn-block rounded-4">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>