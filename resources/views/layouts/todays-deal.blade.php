@section('todays-deal')
<div class="col-lg-2 order-3 mt-3 mt-lg-0">
    <div class="bg-white rounded shadow-sm">
        <div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
            <span class="fw-600 fs-16 mr-2 text-truncate">
                Todays Deal
            </span>
            <span class="badge badge-primary badge-inline">Hot</span>
        </div>
        <div class="c-scrollbar-light overflow-auto h-lg-400px p-2 bg-primary rounded-bottom">
            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                @foreach ($productsByStore->take(20) as $store)
                    @php
                        $product = optional($store->values())->get(3) ?? null;
                        if(is_null($product)){
                            continue;
                        }
                    @endphp
                        <div class="col mb-2">
                            <a href="/product/{{ $product->slug }}" class="d-block p-2 text-reset bg-white h-100 rounded">
                                <div class="row gutters-5 align-items-center">
                                    <div class="col-xxl">
                                        <div class="img">
                                            <img
                                                class="lazyload img-fit h-140px h-lg-80px"
                                                src="/assets/img/placeholder.jpg"
                                                data-src="/{{ $product->thumbnail_img }}"
                                                alt="{{ $product->name }}"
                                                onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-xxl">
                                        <div class="fs-16">
                                            <span class="d-block text-primary fw-600">₦{{ number_format($product->newprice, 2) }}</span>
                                            @if ($product->hasDiscount())
                                            <del class="d-block opacity-70">₦{{ number_format($product->price, 2) }}</del>
                                            @endif                                                  
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection