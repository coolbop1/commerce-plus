<div class="">
    @if (count($categories) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Category Suggestions</div>
        <ul class="list-group list-group-raw">
            @foreach ($categories as $key => $category)
            @php
                $categoryName = $category->name;
                $name_string = str_replace(' ', '_',$categoryName);
                $cat_name = str_replace('-', ':::', $categoryName);
                $cat_name_slug = str_replace(' ', '-', $cat_name);
            @endphp
                <li class="list-group-item py-1">
                    <a class="text-reset hov-text-primary" href="/category/{{ $cat_name_slug }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="">
    @if (count($products) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Products</div>
        <ul class="list-group list-group-raw">
            @foreach ($products as $key => $product)
                <li class="list-group-item">
                    <a class="text-reset" href="/product/{{ $product->slug }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="mr-3">
                                <img class="size-40px img-fit rounded" src="/{{ $product->thumbnail_img }} alt="{{ $product->name }}"
                                onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"">
                            </div>
                            <div class="flex-grow-1 overflow--hidden minw-0">
                                <div class="product-name text-truncate fs-14 mb-5px">
                                    {{  $product->name }}
                                </div>
                                <div class="">
                                    @if($product->newprice != $product->price)
                                        <del class="opacity-60 fs-15">₦{{ number_format($product->price, 2) }}</del>
                                    @endif
                                    <span class="fw-600 fs-16 text-primary">₦{{ number_format($product->newprice, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="">
    @if (count($shops) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">Shops</div>
        <ul class="list-group list-group-raw">
            @foreach ($shops as $key => $store)
                <li class="list-group-item">
                    <a class="text-reset" href="/shop/{{ str_replace(' ', '-', $store->name) }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="mr-3">
                                <img class="size-40px img-fit rounded" src="/{{ $store->logo }}"  onerror="this.onerror=null;this.src='/uploads/store_logo_placeholder.png';">
                            </div>
                            <div class="flex-grow-1 overflow--hidden">
                                <div class="product-name text-truncate fs-14 mb-5px">
                                    {{ $store->name }}
                                </div>
                                <div class="opacity-60">
                                    {{ $store->address }}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
