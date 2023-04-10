@section('home-category-and-brand')
<section class="mb-4">
    <div class="container">
        <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="d-flex mb-3 align-items-baseline border-bottom">
                        <h3 class="h5 fw-700 mb-0">
                            <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Top 4 Categories</span>
                        </h3>
                        <a href="/categories" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View All Categories</a>
                    </div>
                    <div class="row gutters-5">
                        @foreach ($categories->take(4) as $category)
                        @php
                            $categoryName = $category->name;
                            $name_string = str_replace(' ', '_',$categoryName);
                            $cat_name = str_replace('-', ':::', $categoryName);
                            $cat_name_slug = str_replace(' ', '-', $cat_name);
                        @endphp
                        <div class="col-sm-6">
                            <a href="/category/{{ $cat_name_slug  }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="/assets/img/placeholder.jpg"
                                            alt="{{ $category->name }}"
                                            class="img-fluid img lazyload h-60px"
                                            onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->name }}</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                                                <div class="col-lg-6">
                    <div class="d-flex mb-3 align-items-baseline border-bottom">
                        <h3 class="h5 fw-700 mb-0">
                            <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Top 4 Brands</span>
                        </h3>
                        <a href="/brands" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">View All Brands</a>
                    </div>
                    <div class="row gutters-5">
                        @foreach ($brands->take(4) as $brand)
                        @php
                            $brandName = $brand->name;
                            $name_string = str_replace(' ', '_',$brandName);
                            $brad_name = str_replace('-', ':::', $brandName);
                            $brand_name_slug = str_replace(' ', '-', $brad_name);
                        @endphp
                        <div class="col-sm-6">
                            <a href="/brand/{{ $brand_name_slug }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-4 text-center">
                                        <img
                                            src="/assets/img/placeholder.jpg"
                                            alt="{{ $brand->name }}"
                                            class="img-fluid img lazyload h-60px"
                                            onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';"
                                        >
                                    </div>
                                    <div class="col-6">
                                        <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->name }}</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection