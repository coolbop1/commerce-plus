@section('sellers-card')
<section class="mb-3 pb-3">
    <div class="bg-white px-3">
        <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 gutters-16 border-top border-left">

            @foreach ($stores as $store)
            @php
                $products_id = $store->products->pluck('id')->toArray();
                $ratings_data = App\Models\Cart::whereHas('checkout', function($q) {
                    $q->where('status', 'completed');
                })->whereIn('product_id', $products_id)->where('ratings', '>', 0)->select(DB::raw('count(*) as num'), DB::raw('sum(ratings) as total_ratings'))->first();
                $total_ratings = $ratings_data->total_ratings ?? 0;
                $total_sold = $ratings_data->num;
                $ratings = $total_sold > 0 ? ($total_ratings/$total_sold) : 0;
            @endphp
                <div class="col text-center border-right border-bottom has-transition hov-shadow-out z-1">
                    <div class="position-relative px-3" style="padding-top: 2rem; padding-bottom:2rem;">
                        <!-- Shop logo & Verification Status -->
                        <div class="position-relative mx-auto size-100px size-md-120px">
                            <a href="/shop/{{ str_replace(' ', '-', $store->name) }}" class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img" tabindex="0" style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
                                <img src="/{{ $store->shop_logo }}" data-src="/{{ $store->shop_logo }}" alt="{{ $store->name }}" class="img-fit has-transition lazyloaded" onerror="this.onerror=null;this.src='/uploads/store_logo_placeholder.png';">
                            </a>
                            <div class="absolute-top-right z-1 mr-md-2 mt-1 rounded-content bg-white">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24" viewBox="0 0 24.001 24">
                                        <g id="Group_25929" data-name="Group 25929" transform="translate(-480 -345)">
                                            <circle id="Ellipse_637" data-name="Ellipse 637" cx="12" cy="12" r="12" transform="translate(480 345)" fill="#fff"></circle>
                                            <g id="Group_25927" data-name="Group 25927" transform="translate(480 345)">
                                            <path id="Union_5" data-name="Union 5" d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z" transform="translate(0 0)" fill="#3490f3"></path>
                                            </g>
                                        </g>
                                    </svg>
                                                                            </div>
                        </div>
                        <!-- Shop name -->
                        <h2 class="fs-14 fw-700 text-dark text-truncate-2 h-40px mt-4 mb-3">
                            <a href="/shop/{{ str_replace(' ', '-', $store->name) }}" class="text-reset hov-text-primary" tabindex="0">{{ $store->name }}</a>
                        </h2>
                        <!-- Shop Rating -->
                        <div class="rating rating-mr-1 text-dark mb-3">
                            <i class="las la-star {{ $ratings >= 1 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 2 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 3 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 4 ? 'active' : '' }}"></i><i class="las la-star {{ $ratings >= 5 ? 'active' : '' }}"></i>
                            <span class="opacity-60 fs-14">({{ $total_ratings ?? 0 }}
                                reviews)</span>
                        </div>
                        <!-- Visit Button -->
                        <a href="/shop/{{ str_replace(' ', '-', $store->name) }}" class="btn-visit">
                            <span class="circle" aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">Visit Store</span>
                        </a>
                    </div>
                </div>
            @endforeach
                    
        </div>
        <!-- Pagination -->
        <div class="aiz-pagination aiz-pagination-center mt-4">
            
        </div>
    </div>
</section>
@endsection