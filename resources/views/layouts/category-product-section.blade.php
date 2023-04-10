@section('category-product-section')
<section class="mb-4 pt-4">
    <div class="container sm-px-0 pt-2">
        <form class="" id="search-form" action="" method="GET">
            <div class="row">

                <!-- Sidebar Filters -->
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

                            <!-- Categories -->
                            <div class="bg-white border mb-3">
                                <div class="fs-16 fw-700 p-3">
                                    <a href="#collapse_1" class="dropdown-toggle filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                        Categories
                                    </a>
                                </div>
                                <div class="collapse show" id="collapse_1">
                                    <ul class="p-3 mb-0 list-unstyled">
                                        <li class="mb-3">
                                            <a class="text-reset fs-14 fw-600 hov-text-primary" href="/categories">
                                                <i class="las la-angle-left"></i>
                                                All Categories
                                            </a>
                                        </li>
                                        <li class="mb-3">
                                            @php
                                                $cat_name_ = str_replace('-',':::', $category->name);
                                                $cat_name_slug_ = str_replace(' ', '-', $cat_name_);
                                            @endphp 
                                            <a class="text-reset fs-14 fw-600 hov-text-primary" href="/category/{{ $cat_name_slug_ }}">
                                                <i class="las la-angle-left"></i>
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @foreach ($sibling_category as $cat)
                                        @php
                                            $cat_name = str_replace('-',':::', $cat->name);
                                            $cat_name_slug = str_replace(' ', '-', $cat_name);
                                        @endphp 
                                            <li class="ml-4 mb-3">
                                                <a class="text-reset fs-14 hov-text-primary" href="/category/{{ $cat_name_slug }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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
                                <input id="category_id" type="hidden" value="{{ $category->id }}">
                                <input id="cat_type" type="hidden" value="{{ $type }}">
                                <label for="min_price"> &nbsp; Min Price</label>
                                <input class="form-control" onchange="filter()" id="min_price" type="number" name="min_price" value="0.00">
                                <br>
                                <label  for="max_price"> &nbsp; Max Price</label>
                                <input class="form-control" onchange="filter()" id="max_price" type="number" name="max_price" value="2000000">
                                <br>
                            </div>
                            
                            <!-- Attributes -->
                                                                
                            <!-- Color -->
                                                                <div class="bg-white border mb-3">
                                    <div class="fs-16 fw-700 p-3">
                                        <a href="#" class="dropdown-toggle text-dark filter-section collapsed d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapse_color">
                                            Filter by color
                                        </a>
                                    </div>
                                                                            <div class="collapse " id="collapse_color">
                                        <div class="p-3 aiz-radio-inline">
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="IndianRed">
                                                <input type="radio" name="color" value="#CD5C5C" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #CD5C5C;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightCoral">
                                                <input type="radio" name="color" value="#F08080" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F08080;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Salmon">
                                                <input type="radio" name="color" value="#FA8072" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FA8072;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkSalmon">
                                                <input type="radio" name="color" value="#E9967A" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #E9967A;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSalmon">
                                                <input type="radio" name="color" value="#FFA07A" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFA07A;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Crimson">
                                                <input type="radio" name="color" value="#DC143C" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DC143C;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Red">
                                                <input type="radio" name="color" value="#FF0000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF0000;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="FireBrick">
                                                <input type="radio" name="color" value="#B22222" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #B22222;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkRed">
                                                <input type="radio" name="color" value="#8B0000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #8B0000;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Pink">
                                                <input type="radio" name="color" value="#FFC0CB" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFC0CB;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightPink">
                                                <input type="radio" name="color" value="#FFB6C1" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFB6C1;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="HotPink">
                                                <input type="radio" name="color" value="#FF69B4" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF69B4;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DeepPink">
                                                <input type="radio" name="color" value="#FF1493" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF1493;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumVioletRed">
                                                <input type="radio" name="color" value="#C71585" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #C71585;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PaleVioletRed">
                                                <input type="radio" name="color" value="#DB7093" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DB7093;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSalmon">
                                                <input type="radio" name="color" value="#FFA07A" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFA07A;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Coral">
                                                <input type="radio" name="color" value="#FF7F50" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF7F50;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Tomato">
                                                <input type="radio" name="color" value="#FF6347" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF6347;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="OrangeRed">
                                                <input type="radio" name="color" value="#FF4500" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF4500;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkOrange">
                                                <input type="radio" name="color" value="#FF8C00" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF8C00;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Orange">
                                                <input type="radio" name="color" value="#FFA500" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFA500;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Gold">
                                                <input type="radio" name="color" value="#FFD700" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFD700;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Yellow">
                                                <input type="radio" name="color" value="#FFFF00" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFF00;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightYellow">
                                                <input type="radio" name="color" value="#FFFFE0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFFE0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LemonChiffon">
                                                <input type="radio" name="color" value="#FFFACD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFACD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightGoldenrodYellow">
                                                <input type="radio" name="color" value="#FAFAD2" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FAFAD2;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PapayaWhip">
                                                <input type="radio" name="color" value="#FFEFD5" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFEFD5;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Moccasin">
                                                <input type="radio" name="color" value="#FFE4B5" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFE4B5;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PeachPuff">
                                                <input type="radio" name="color" value="#FFDAB9" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFDAB9;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PaleGoldenrod">
                                                <input type="radio" name="color" value="#EEE8AA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #EEE8AA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Khaki">
                                                <input type="radio" name="color" value="#F0E68C" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F0E68C;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkKhaki">
                                                <input type="radio" name="color" value="#BDB76B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #BDB76B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Lavender">
                                                <input type="radio" name="color" value="#E6E6FA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #E6E6FA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Thistle">
                                                <input type="radio" name="color" value="#D8BFD8" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #D8BFD8;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Plum">
                                                <input type="radio" name="color" value="#DDA0DD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DDA0DD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Violet">
                                                <input type="radio" name="color" value="#EE82EE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #EE82EE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Orchid">
                                                <input type="radio" name="color" value="#DA70D6" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DA70D6;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Fuchsia">
                                                <input type="radio" name="color" value="#FF00FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF00FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Magenta">
                                                <input type="radio" name="color" value="#FF00FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FF00FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumOrchid">
                                                <input type="radio" name="color" value="#BA55D3" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #BA55D3;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumPurple">
                                                <input type="radio" name="color" value="#9370DB" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #9370DB;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Amethyst">
                                                <input type="radio" name="color" value="#9966CC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #9966CC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BlueViolet">
                                                <input type="radio" name="color" value="#8A2BE2" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #8A2BE2;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkViolet">
                                                <input type="radio" name="color" value="#9400D3" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #9400D3;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkOrchid">
                                                <input type="radio" name="color" value="#9932CC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #9932CC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkMagenta">
                                                <input type="radio" name="color" value="#8B008B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #8B008B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Purple">
                                                <input type="radio" name="color" value="#800080" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #800080;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Indigo">
                                                <input type="radio" name="color" value="#4B0082" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #4B0082;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SlateBlue">
                                                <input type="radio" name="color" value="#6A5ACD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #6A5ACD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkSlateBlue">
                                                <input type="radio" name="color" value="#483D8B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #483D8B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumSlateBlue">
                                                <input type="radio" name="color" value="#7B68EE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #7B68EE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="GreenYellow">
                                                <input type="radio" name="color" value="#ADFF2F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #ADFF2F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Chartreuse">
                                                <input type="radio" name="color" value="#7FFF00" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #7FFF00;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LawnGreen">
                                                <input type="radio" name="color" value="#7CFC00" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #7CFC00;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Lime">
                                                <input type="radio" name="color" value="#00FF00" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00FF00;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LimeGreen">
                                                <input type="radio" name="color" value="#32CD32" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #32CD32;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PaleGreen">
                                                <input type="radio" name="color" value="#98FB98" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #98FB98;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightGreen">
                                                <input type="radio" name="color" value="#90EE90" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #90EE90;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumSpringGreen">
                                                <input type="radio" name="color" value="#00FA9A" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00FA9A;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SpringGreen">
                                                <input type="radio" name="color" value="#00FF7F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00FF7F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumSeaGreen">
                                                <input type="radio" name="color" value="#3CB371" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #3CB371;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SeaGreen">
                                                <input type="radio" name="color" value="#2E8B57" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #2E8B57;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="ForestGreen">
                                                <input type="radio" name="color" value="#228B22" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #228B22;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Green">
                                                <input type="radio" name="color" value="#008000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #008000;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkGreen">
                                                <input type="radio" name="color" value="#006400" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #006400;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="YellowGreen">
                                                <input type="radio" name="color" value="#9ACD32" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #9ACD32;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="OliveDrab">
                                                <input type="radio" name="color" value="#6B8E23" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #6B8E23;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Olive">
                                                <input type="radio" name="color" value="#808000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #808000;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkOliveGreen">
                                                <input type="radio" name="color" value="#556B2F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #556B2F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumAquamarine">
                                                <input type="radio" name="color" value="#66CDAA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #66CDAA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkSeaGreen">
                                                <input type="radio" name="color" value="#8FBC8F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #8FBC8F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSeaGreen">
                                                <input type="radio" name="color" value="#20B2AA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #20B2AA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkCyan">
                                                <input type="radio" name="color" value="#008B8B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #008B8B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Teal">
                                                <input type="radio" name="color" value="#008080" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #008080;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Aqua">
                                                <input type="radio" name="color" value="#00FFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00FFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Cyan">
                                                <input type="radio" name="color" value="#00FFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00FFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightCyan">
                                                <input type="radio" name="color" value="#E0FFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #E0FFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PaleTurquoise">
                                                <input type="radio" name="color" value="#AFEEEE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #AFEEEE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Aquamarine">
                                                <input type="radio" name="color" value="#7FFFD4" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #7FFFD4;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Turquoise">
                                                <input type="radio" name="color" value="#40E0D0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #40E0D0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumTurquoise">
                                                <input type="radio" name="color" value="#48D1CC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #48D1CC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkTurquoise">
                                                <input type="radio" name="color" value="#00CED1" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00CED1;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="CadetBlue">
                                                <input type="radio" name="color" value="#5F9EA0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #5F9EA0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SteelBlue">
                                                <input type="radio" name="color" value="#4682B4" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #4682B4;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSteelBlue">
                                                <input type="radio" name="color" value="#B0C4DE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #B0C4DE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="PowderBlue">
                                                <input type="radio" name="color" value="#B0E0E6" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #B0E0E6;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightBlue">
                                                <input type="radio" name="color" value="#ADD8E6" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #ADD8E6;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SkyBlue">
                                                <input type="radio" name="color" value="#87CEEB" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #87CEEB;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSkyBlue">
                                                <input type="radio" name="color" value="#87CEFA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #87CEFA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DeepSkyBlue">
                                                <input type="radio" name="color" value="#00BFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00BFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DodgerBlue">
                                                <input type="radio" name="color" value="#1E90FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #1E90FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="CornflowerBlue">
                                                <input type="radio" name="color" value="#6495ED" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #6495ED;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumSlateBlue">
                                                <input type="radio" name="color" value="#7B68EE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #7B68EE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="RoyalBlue">
                                                <input type="radio" name="color" value="#4169E1" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #4169E1;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Blue">
                                                <input type="radio" name="color" value="#0000FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #0000FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MediumBlue">
                                                <input type="radio" name="color" value="#0000CD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #0000CD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkBlue">
                                                <input type="radio" name="color" value="#00008B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #00008B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Navy">
                                                <input type="radio" name="color" value="#000080" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #000080;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MidnightBlue">
                                                <input type="radio" name="color" value="#191970" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #191970;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Cornsilk">
                                                <input type="radio" name="color" value="#FFF8DC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFF8DC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BlanchedAlmond">
                                                <input type="radio" name="color" value="#FFEBCD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFEBCD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Bisque">
                                                <input type="radio" name="color" value="#FFE4C4" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFE4C4;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="NavajoWhite">
                                                <input type="radio" name="color" value="#FFDEAD" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFDEAD;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Wheat">
                                                <input type="radio" name="color" value="#F5DEB3" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F5DEB3;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BurlyWood">
                                                <input type="radio" name="color" value="#DEB887" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DEB887;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Tan">
                                                <input type="radio" name="color" value="#D2B48C" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #D2B48C;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="RosyBrown">
                                                <input type="radio" name="color" value="#BC8F8F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #BC8F8F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SandyBrown">
                                                <input type="radio" name="color" value="#F4A460" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F4A460;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Goldenrod">
                                                <input type="radio" name="color" value="#DAA520" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DAA520;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkGoldenrod">
                                                <input type="radio" name="color" value="#B8860B" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #B8860B;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Peru">
                                                <input type="radio" name="color" value="#CD853F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #CD853F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Chocolate">
                                                <input type="radio" name="color" value="#D2691E" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #D2691E;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SaddleBrown">
                                                <input type="radio" name="color" value="#8B4513" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #8B4513;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Sienna">
                                                <input type="radio" name="color" value="#A0522D" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #A0522D;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Brown">
                                                <input type="radio" name="color" value="#A52A2A" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #A52A2A;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Maroon">
                                                <input type="radio" name="color" value="#800000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #800000;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="White">
                                                <input type="radio" name="color" value="#FFFFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Snow">
                                                <input type="radio" name="color" value="#FFFAFA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFAFA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Honeydew">
                                                <input type="radio" name="color" value="#F0FFF0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F0FFF0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MintCream">
                                                <input type="radio" name="color" value="#F5FFFA" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F5FFFA;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Azure">
                                                <input type="radio" name="color" value="#F0FFFF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F0FFFF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="AliceBlue">
                                                <input type="radio" name="color" value="#F0F8FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F0F8FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="GhostWhite">
                                                <input type="radio" name="color" value="#F8F8FF" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F8F8FF;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="WhiteSmoke">
                                                <input type="radio" name="color" value="#F5F5F5" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F5F5F5;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Seashell">
                                                <input type="radio" name="color" value="#FFF5EE" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFF5EE;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Beige">
                                                <input type="radio" name="color" value="#F5F5DC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #F5F5DC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="OldLace">
                                                <input type="radio" name="color" value="#FDF5E6" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FDF5E6;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="FloralWhite">
                                                <input type="radio" name="color" value="#FFFAF0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFAF0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Ivory">
                                                <input type="radio" name="color" value="#FFFFF0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFFF0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="AntiqueWhite">
                                                <input type="radio" name="color" value="#FAEBD7" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FAEBD7;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Linen">
                                                <input type="radio" name="color" value="#FAF0E6" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FAF0E6;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LavenderBlush">
                                                <input type="radio" name="color" value="#FFF0F5" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFF0F5;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MistyRose">
                                                <input type="radio" name="color" value="#FFE4E1" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #FFE4E1;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Gainsboro">
                                                <input type="radio" name="color" value="#DCDCDC" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #DCDCDC;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightGrey">
                                                <input type="radio" name="color" value="#D3D3D3" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #D3D3D3;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Silver">
                                                <input type="radio" name="color" value="#C0C0C0" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #C0C0C0;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkGray">
                                                <input type="radio" name="color" value="#A9A9A9" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #A9A9A9;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Gray">
                                                <input type="radio" name="color" value="#808080" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #808080;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DimGray">
                                                <input type="radio" name="color" value="#696969" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #696969;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSlateGray">
                                                <input type="radio" name="color" value="#778899" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #778899;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SlateGray">
                                                <input type="radio" name="color" value="#708090" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #708090;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkSlateGray">
                                                <input type="radio" name="color" value="#2F4F4F" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #2F4F4F;"></span>
                                                </span>
                                            </label>
                                                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Black">
                                                <input type="radio" name="color" value="#000000" onchange="filter()">
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: #000000;"></span>
                                                </span>
                                            </label>
                                                                                        </div>
                                    </div>
                                </div>
                                                        </div>
                    </div>
                </div>
                
                <!-- Contents -->
                <div class="col-xl-9">
                    
                    <!-- Breadcrumb -->
                    <ul class="breadcrumb bg-transparent py-0 px-1">
                        <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                            <a class="text-reset" href="/">Home</a>
                        </li>
                            <li class="breadcrumb-item opacity-50 hov-opacity-100">
                                <a class="text-reset" href="/categories">All Categories</a>
                            </li>
                            <li class="text-dark fw-600 breadcrumb-item">
                                "{{ $category->name }}"
                            </li>
                                                </ul>
                    
                    <!-- Top Filters -->
                    <div class="text-left">
                        <div class="row gutters-5 flex-wrap align-items-center">
                            <div class="col-lg col-10">
                                <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                                                                {{ $category->name }}
                                                                        </h1>
                                <input type="hidden" name="keyword" value="">
                            </div>
                            <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                    <i class="la la-filter la-2x"></i>
                                </button>
                            </div>
                            <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                                <select id="brand" class="form-control form-control-sm aiz-selectpicker rounded-0" data-live-search="true" name="brand" onchange="filter()">
                                <option value="">Brands</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                <select id="sort_by" class="form-control form-control-sm aiz-selectpicker rounded-0" name="sort_by" onchange="filter()">
                                    <option value="">Sort By</option>
                                    <option value="newest" >Newest</option>
                                    <option value="oldest" >Oldest</option>
                                    <option value="price-asc" >Price low to high</option>
                                    <option value="price-desc" >Price high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Products -->
                    <div class="px-3">
                        <div id="all-products" class="row gutters-16 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2 border-top border-left">
                            @foreach ($category->products as $product)
                                <div class="col border-right border-bottom has-transition hov-shadow-out z-1">
                                    <div class="aiz-card-box h-auto bg-white py-3 hov-scale-img">
                                        <div class="position-relative h-140px h-md-200px img-fit overflow-hidden">
                                                    <!-- Image -->
                                            <a href="/product/{{ $product->slug }}" class="d-block h-100">
                                                <img class="mx-auto img-fit has-transition lazyloaded" src="/{{ $product->thumbnail_img }}" data-src="/{{ $product->thumbnail_img }}" alt="{{ $product->name }}" title="{{ $product->name }}" onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                                            </a>
                                            @if ($product->hasDiscount())
                                                <!-- Discount percentage tag -->
                                                <span class="absolute-top-left bg-primary ml-1 mt-1 fs-11 fw-700 text-white w-35px text-center" style="padding-top:2px;padding-bottom:2px;">-{{ $product->discountPercentage() }}%</span>
                                            @endif
                                            
                                                    <!-- Wholesale tag -->
                                                                <!-- wishlisht & compare icons -->
                                                <div class="absolute-top-right aiz-p-hov-icon">
                                                    <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishListV2({{ $product->id }})" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                        <i class="la la-heart-o"></i>
                                                    </a>
                                                    <a data-value="{{ str_replace('"', "'", json_encode($product)) }}" href="javascript:void(0)" onclick="addToCart ({{ $product->id }}, this, type = 'online')" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                        <i class="las la-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <!-- add to cart -->
                                                {{-- <a class="cart-btn absolute-bottom-left w-100 h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column justify-content-center align-items-center " href="javascript:void(0)" onclick="showAddToCartModal(161)">
                                                    <span class="cart-btn-text">Add to cart</span>
                                                    <br>
                                                    <span><i class="las la-2x la-shopping-cart"></i></span>
                                                </a> --}}
                                        </div>

                                        <div class="p-2 p-md-3 text-left">
                                            <!-- Product name -->
                                            <h3 class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px text-center">
                                                <a href="/product/{{ $product->slug }}" class="d-block text-reset hov-text-primary" title="{{ $product->name }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="fs-14 d-flex justify-content-center mt-3">
                                                        <!-- Previous price -->
                                                        @if ($product->hasDiscount())
                                                            <div class="disc-amount has-transition">
                                                                <del class="fw-400 text-secondary mr-1">₦{{ number_format($product->price, 2) }}</del>
                                                            </div>
                                                        @endif
                                                        
                                                    <!-- price -->
                                                    <div class="">
                                                        <span class="fw-700 text-primary">₦{{ number_format($product->new_price, 2) }}</span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="aiz-pagination mt-4">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection