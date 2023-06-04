@foreach ($carts as $cart)
<li class="list-group-item">
    <div class="d-flex align-items-center">
        <span class="mr-2 mr-md-3">
            <img src="/{{ $cart->product->thumbnail_img }}"
                class="img-fit size-60px"
                alt="{{ $cart->product->name }}"
                onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
        </span>
        <span class="fs-14 fw-400 text-dark">
            {{ $cart->product->name }}
            <br>
        </span>
    </div>
</li>
@endforeach