@foreach ($carts as $cart)
<tr class="cart_item">
    <td class="product-name pl-0 fs-14 text-dark fw-400 border-top-0 border-bottom">
        {{ $cart->product->name }}
        <strong class="product-quantity">
            × {{ $cart->qty }}
        </strong>
    </td>
    <td class="product-total text-right pr-0 fs-14 text-primary fw-600 border-top-0 border-bottom">
        <span
            class="pl-4 pr-0">₦{{ number_format(($cart->product->newprice * $cart->qty), 2) }}</span>
    </td>
</tr>
@endforeach