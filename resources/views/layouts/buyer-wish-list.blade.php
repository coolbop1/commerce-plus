@section('buyer-wish-list')
<div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 gutters-16 border-top border-left mx-1 mx-md-0 mb-4">
    @foreach ($user->wishList as $product)
        <div id="wish-product-{{ $product->id }}" class="aiz-card-box col py-3 text-center border-right border-bottom has-transition hov-shadow-out z-1" id="wishlist_1">
            <div class="position-relative h-140px h-md-200px img-fit overflow-hidden mb-3">
                <!-- Image -->
                <a href="/product/{{ $product->slug }}" class="d-block h-100">
                    <img src="/{{ $product->thumbnail_img }}" class="mx-auto img-fit ls-is-cached lazyloaded" title="{{ $product->name }}">
                </a>
                <!-- Remove from wishlisht -->
                <div class="absolute-top-right aiz-p-hov-icon">
                    <a href="javascript:void(0)" onclick="addToWishListV2({{ $product->id }}, document.getElementById('wish-product-{{ $product->id }}') )" data-toggle="tooltip" data-title="Remove from wishlist" data-placement="left">
                        <i class="la la-trash"></i>
                    </a>
                    <a href="javascript:void(0)" data-value="{{ str_replace(`"`, `'`, json_encode($product)) }}" onclick="addToCart({{ $product->id }}, this, 'online' )" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                        <i class="las la-shopping-cart"></i>
                    </a>
                </div>
            </div>
            <!-- Product Name -->
            <h5 class="fs-14 mb-0 lh-1-5 fw-400 text-truncate-2 mb-3">
                <a href="/product/{{ $product->slug }}" class="text-reset hov-text-primary" title="{{ $product->name }}">{{ $product->name }}</a>
            </h5>
            <!-- Price -->
            <div class="fs-14">
                <span class="fw-600 text-primary">₦{{ number_format($product->new_price, 2) }}</span>
                @if ($product->hasDiscount())
                <del class="opacity-60 ml-1">₦{{ number_format($product->price, 2) }}</del>
                @endif
                
            </div>
        </div>
        
    @endforeach
@endsection