@extends('layouts.app')

@section('content')
<br>&nbsp;<br>
<section class="mb-4 pt-4">
    <div class="container sm-px-0 pt-2">
<div class="row">
        <div class="col-xl-3">
            <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                <div class="collapse-sidebar c-scrollbar-light text-left">
                    <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                        <h3 class="h6 mb-0 fw-600">Filters</h3>
                        <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                            <i class="las la-times la-2x"></i>
                        </button>
                    </div>

                    <!-- Price range -->
                    <div class="bg-white border mb-3">
                        <div class="fs-16 fw-700 p-3">
                            Price ranges
                        </div>
                        <div class="p-3 mr-3">
                            <div class="aiz-range-slider">
                                <div id="input-slider-range" data-range-value-min="0" data-range-value-max=" 2000000 " class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                                </div>

                                <div class="row mt-2">
                                    <div class="col-6">
                                        <span style="font: 700" class="range-slider-value value-low fs-14 fw-600 opacity-70" data-range-value-low="0" id="input-slider-range-value-low">0</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span style="font: 700" class="range-slider-value value-high fs-14 fw-600 opacity-70" data-range-value-high="2000000" id="input-slider-range-value-high">2000000.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hidden Items -->
                        {{-- <input id="category_id" type="hidden" value="{{ $category->id }}">
                        <input id="cat_type" type="hidden" value="{{ $type }}"> --}}
                        <label for="min_price"> &nbsp; Min Price</label>
                        <input class="form-control" onchange="filter(false, '{{ $_GET['keyword'] }}')" id="min_price" type="number" name="min_price" value="0.00">
                        <br>
                        <label  for="max_price"> &nbsp; Max Price</label>
                        <input class="form-control" onchange="filter(false, '{{ $_GET['keyword'] }}')" id="max_price" type="number" name="max_price" value="2000000">
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="text-left">
                <div class="row gutters-5 flex-wrap align-items-center">
                    <div class="col-lg col-10">
                        {{-- <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                                                        {{ $category->name }}
                                                                </h1> --}}
                        <input type="hidden" name="keyword" value="">
                    </div>
                    <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                        <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                            <i class="la la-filter la-2x"></i>
                        </button>
                    </div>
                    <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                        <select id="brand" class="form-control form-control-sm aiz-selectpicker rounded-0" data-live-search="true" name="brand" onchange="filter(false, '{{ $_GET['keyword'] }}')">
                        <option value="">Brands</option>
                        {{-- @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach --}}
                        </select>
                    </div>
                    <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                        <select id="sort_by" class="form-control form-control-sm aiz-selectpicker rounded-0" name="sort_by" onchange="filter(false, '{{ $_GET['keyword'] }}')">
                            <option value="">Sort By</option>
                            <option value="newest" >Newest</option>
                            <option value="oldest" >Oldest</option>
                            <option value="price-asc" >Price low to high</option>
                            <option value="price-desc" >Price high to low</option>
                        </select>
                    </div>
                </div>
            </div>
            
        @include('partials.search-content')
        </div>
    </div>
    </div>
</section>
@endsection