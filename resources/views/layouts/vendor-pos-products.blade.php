@section('pos-products')
<section class="gry-bg py-4 profile">
    <div class="container-fluid">
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="tOecRl9TOuzQ9bL8Irt8SJZSjhp1HV89ck572Tpg">            <div class="row gutters-10">
                <div class="col-md">
                    <div class="row gutters-5 mb-3">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="form-group mb-0">
                                <input class="form-control form-control-lg" type="text" name="keyword" placeholder="Search by Product Name/Barcode" onkeyup="filterProducts()">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <select name="poscategory" class="form-control form-control-lg aiz-selectpicker" data-live-search="true" onchange="filterProducts()">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option 
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->subCategories as $subCategory)
                                        <option 
                                        value="{{ $category->id }}_{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @foreach ($subCategory->sections as $section)
                                            <option 
                                            value="{{ $category->id }}_{{ $subCategory->id }}_{{ $section->id }}">{{$section->name}}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach                      
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <select name="brand"  class="form-control form-control-lg aiz-selectpicker" data-live-search="true" onchange="filterProducts()">
                                <option value="">All Brands</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach                                      
                            </select>
                        </div>
                    </div>
                    <div class="aiz-pos-product-list c-scrollbar-light">
                        <div class="d-flex flex-wrap justify-content-center" id="product-list">



                            @foreach ($store->products as $product)
                            @php
                                $product_name_link = str_replace(' ', '-', $product->name);
                                $product_hero_image = $product->thumbnail_img;
                                $date_range = $product->date_range;
                                $within_range = true;
                                if($date_range) {
                                    $dates = explode(' to ', $date_range);
                                    $from_date = $dates[0];
                                    $to_date = $dates[1];
                                    $within_range =  Carbon\Carbon::parse($from_date)->lte(now()) && Carbon\Carbon::parse($to_date)->gte(now());
                                }  
                                $has_discount = $product->discount > 0 && $within_range;
                                if($has_discount) {
                                    $perc = $product->discount_type == 'percent' ? $product->discount : ((100 * $product->discount)/$product->price);
                                    $product->new_price = $product->price - (($perc/100) * $product->price);
                                }
                            @endphp
                                <div onclick="addToCart({{ $product }})" class="w-140px w-xl-180px w-xxl-210px mx-2">
                                    <div class="card bg-white c-pointer product-card hov-container">
                                        <div class="position-relative">
                                            <span class="absolute-top-left mt-1 ml-1 mr-0">
                                                @if ($product->quantity == 0)
                                                <span class="badge badge-inline badge-danger fs-13">Out of Stock
                                                    : 0</span>
                                                @else
                                                <span class="badge badge-inline badge-success fs-13">In stock
                                                    : {{ $product->quantity }}</span>
                                                @endif
                                                
                                            </span>
                                            <span class="badge badge-inline badge-warning absolute-bottom-left mb-1 ml-1 mr-0 fs-13 text-truncate"></span>
                                            <img src="{{ $product_hero_image ? '/'.$product_hero_image : asset('/assets/img/placeholder.jpg') }}" class="card-img-top img-fit h-120px h-xl-180px h-xxl-210px mw-100 mx-auto">
                                        </div>
                                        <div class="card-body p-2 p-xl-3">
                                            <div class="text-truncate fw-600 fs-14 mb-2">{{ $product->name }}</div>
                                            <div class="">
                                                @if ($has_discount)
                                                    @php
                                                        $new_price = $product->price - (($perc/100) * $product->price);
                                                    @endphp
                                                    <del class="mr-2 ml-0">₦{{ $product->price }}</del>
                                                @else
                                                    @php
                                                        $new_price = null;
                                                    @endphp
                                                @endif
                                                <span>₦{{ $new_price ?? $product->price }}</span>
                                            </div>
                                        </div>
                                        <div class="add-plus absolute-full rounded overflow-hidden hov-box {{ $product->quantity == 0 ? 'c-not-allowed' : '' }}" data-stock-id="{{ $product->id }}">
                                            <div class="absolute-full bg-dark opacity-50">
                                            </div>
                                            <i class="las la-plus absolute-center la-6x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



{{-- 

                            <div class="w-140px w-xl-180px w-xxl-210px mx-2">
                                <div class="card bg-white c-pointer product-card hov-container">
                                    <div class="position-relative">
                                        <span class="absolute-top-left mt-1 ml-1 mr-0">
                                            <span class="badge badge-inline badge-danger fs-13">Out of Stock
                                            : 0</span>
                                        </span>
                                        <span class="badge badge-inline badge-warning absolute-bottom-left mb-1 ml-1 mr-0 fs-13 text-truncate"></span>
                                        <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/4gmGnYIZhgatZRJsxrhXVW2qO0aoLLdZT8U6qOQE.png" class="card-img-top img-fit h-120px h-xl-180px h-xxl-210px mw-100 mx-auto">
                                    </div>
                                    <div class="card-body p-2 p-xl-3">
                                        <div class="text-truncate fw-600 fs-14 mb-2">FIFA 22 Standard - PC [Online Game Code]</div>
                                        <div class="">
                                            <del class="mr-2 ml-0">$59.000</del><span>$56.050</span>
                                        </div>
                                    </div>
                                    <div class="add-plus absolute-full rounded overflow-hidden hov-box c-not-allowed" data-stock-id="490">
                                        <div class="absolute-full bg-dark opacity-50">
                                        </div>
                                        <i class="las la-plus absolute-center la-6x text-white"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="w-140px w-xl-180px w-xxl-210px mx-2">
                                <div class="card bg-white c-pointer product-card hov-container">
                                    <div class="position-relative">
                                        <span class="absolute-top-left mt-1 ml-1 mr-0">
                                            <span class="badge badge-inline badge-success fs-13">In stock
                                            : 494</span>
                                        </span>
                                        <span class="badge badge-inline badge-warning absolute-bottom-left mb-1 ml-1 mr-0 fs-13 text-truncate"></span>
                                        <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xIT7SLG4ciNvO2z4cU47GhtmS1RDiRBlnbzlYwSu.jpg" class="card-img-top img-fit h-120px h-xl-180px h-xxl-210px mw-100 mx-auto">
                                    </div>
                                    <div class="card-body p-2 p-xl-3">
                                        <div class="text-truncate fw-600 fs-14 mb-2">SUNGAIT Ultra Lightweight</div>
                                        <div class="">
                                            <span>$25.000</span>
                                        </div>
                                    </div>
                                    <div class="add-plus absolute-full rounded overflow-hidden hov-box " data-stock-id="381">
                                        <div class="absolute-full bg-dark opacity-50">
                                        </div>
                                        <i class="las la-plus absolute-center la-6x text-white"></i>
                                    </div>
                                </div>
                            </div> --}}














                        </div>
                        <div id="load-more" class="text-center">
                            <div class="fs-14 d-inline-block fw-600 btn btn-soft-primary c-pointer" onclick="loadMoreProduct()">Loading..</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto w-md-350px w-lg-400px w-xl-500px">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex border-bottom pb-3">
                                <div class="flex-grow-1">
                                    <select name="user_id" class="form-control aiz-selectpicker pos-customer" data-live-search="true" onchange="getShippingAddress()">
                                        <option value="">Walk In Customer</option>
                                                                                    <option value="36" data-contact="customer1@example.com">
                                                Arnulfo T. Lucky
                                            </option>
                                                                                    <option value="25" data-contact="">
                                                Alon Mask
                                            </option>
                                                                                    <option value="8" data-contact="customer@example.com">
                                                Paul K. Jensen
                                            </option>
                                                                            </select>
                                </div>
                                <button type="button" class="btn btn-icon btn-soft-dark ml-3 mr-0" data-target="#new-customer" data-toggle="modal">
                                    <i class="las la-truck"></i>
                                </button>
                            </div>
                        
                            <div class="" id="cart-details">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pos-footer mar-btm">
                        <div class="d-flex flex-column flex-md-row justify-content-between">
                            <div class="d-flex">
                                <div class="dropdown mr-3 ml-0 dropup">
                                    <button class="btn btn-outline-dark btn-styled dropdown-toggle" type="button" data-toggle="dropdown">
                                        Shipping
                                    </button>
                                    <div class="dropdown-menu p-3 dropdown-menu-lg">
                                        <div class="input-group">
                                            <input type="number" min="0" placeholder="Amount" name="shipping" class="form-control" value="0" required onchange="setShipping()">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Flat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown dropup">
                                    <button class="btn btn-outline-dark btn-styled dropdown-toggle" type="button" data-toggle="dropdown">
                                        Discount
                                    </button>
                                    <div class="dropdown-menu p-3 dropdown-menu-lg">
                                        <div class="input-group">
                                            <input type="number" min="0" placeholder="Amount" name="discount" class="form-control" value="0" required onchange="setDiscount()">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Flat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2 my-md-0">
                                <button type="button" class="btn btn-primary btn-block" onclick="orderConfirmation()">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>populateCartDetails(<?php echo $store->id ?>)</script>
@endsection