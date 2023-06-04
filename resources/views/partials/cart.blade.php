@foreach ($carts as $cart)
<li class="list-group-item px-0">
    <div class="row gutters-5 align-items-center">
        <!-- Quantity -->
        <div class="col-md-1 col order-1 order-md-0">
                <div class="d-flex flex-column align-items-start aiz-plus-minus mr-2 ml-0">
                    
                    <button
                        onclick="addToCartV2({{ $cart->product_id }})"
                        class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                        type="button" data-type="plus"
                        >
                        <i class="las la-plus"></i>
                    </button>
                    <input type="number"
                        class="col border-0 text-left px-0 flex-grow-1 fs-14 input-number"
                        placeholder="1" value="{{ $cart->qty }}"
                        min="{{ $cart->product->min_qty }}"
                        onchange="addToCartV2({{ $cart->product_id }}, 'online', this.value)">
                    <button
                        onclick="removeFromCartV2({{ $cart->product_id }})"
                        class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                        type="button" data-type="minus"
                        >
                        <i class="las la-minus"></i>
                    </button>
                </div>
                                                    </div>
        <!-- Product Image & name -->
        <div class="col-md-5 d-flex align-items-center mb-2 mb-md-0">
            <span class="mr-2 ml-0">
                <img src="{{ $cart->product->thumbnail_img }}"
                    class="img-fit size-70px"
                    alt="{{ $cart->product->name }}"
                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
            </span>
            <span class="fs-14">{{ $cart->product->name }}</span>
        </div>
        <!-- Price -->
        <div class="col-md col-4 order-2 order-md-0 my-3 my-md-0">
            <span class="opacity-60 fs-12 d-block d-md-none">Price</span>
            <span class="fw-700 fs-14">₦{{ number_format($cart->product->newprice, 2) }}</span>
        </div>
        <!-- Tax -->
        <div class="col-md col-4 order-3 order-md-0 my-3 my-md-0">
            <span class="opacity-60 fs-12 d-block d-md-none">Tax</span>
            <span class="fw-700 fs-14">₦{{ number_format($cart->product->tax, 2) }}</span>
        </div>
        <!-- Total -->
        <div class="col-md col-5 order-4 order-md-0 my-3 my-md-0">
            <span class="opacity-60 fs-12 d-block d-md-none">Total</span>
            <span class="fw-700 fs-16 text-primary">₦{{ number_format((($cart->product->newprice * $cart->qty) + ($cart->product->tax * $cart->qty)), 2) }}</span>
        </div>
        <!-- Remove From Cart -->
        <div class="col-md-auto col-6 order-5 order-md-0 text-right">
            <a href="javascript:void(0)" onclick="removeFromCartV2({{ $cart->product_id }}, 'online', true)" class="btn btn-icon btn-sm btn-soft-primary bg-soft-warning hov-bg-primary btn-circle">
                <i class="las la-trash fs-16"></i>
            </a>
        </div>
    </div>
</li>
@endforeach