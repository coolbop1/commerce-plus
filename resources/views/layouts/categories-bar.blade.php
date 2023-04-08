@section('categories-bar')
<div class="col-lg-3 position-static d-none d-lg-block">
    <div class="aiz-category-menu bg-white rounded  shadow-sm" >
        <div class="p-3 bg-soft-primary d-none d-lg-block rounded-top all-category position-relative text-left">
            <span class="fw-600 fs-16 mr-3">Categories</span>
            <a href="https://demo.activeitzone.com/ecommerce/categories" class="text-reset">
                <span class="d-none d-lg-inline-block">See All ></span>
            </a>
        </div>
        <ul class="list-unstyled categories no-scrollbar py-2 mb-0 text-left">
            @foreach ($categories as $key => $category)
                @php
                    $list_number = $key + 1;
                    $categoryName = $category->name;
                    $name_string = str_replace(' ', '_',$categoryName);
                @endphp
                <li class="category-nav-element" data-id="{{ $list_number }}">
                    <a href="category/{{  $categoryName }}" class="text-truncate text-reset py-2 px-3 d-block">
                        <img
                            class="cat-image lazyload mr-2 opacity-60"
                            src="uploads/{{ $name_string }}.jpeg"
                            data-src="uploads/{{ $name_string }}.jpeg"
                            width="16"
                            alt="{{ $categoryName }}"
                            onerror="this.onerror=null;this.src='uploads/{{ $name_string }}.jpeg';"
                        >
                        <span class="cat-name">{{ $categoryName }}</span>
                    </a>
                    {{-- <div id="sub-cat-menu-{{ $list_number }}" class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4"> --}}
                        <div class="sub-cat-menu c-scrollbar-light border p-4 shadow-none loaded">
                            <div class="card-columns">
                                @foreach ($category->subCategories as $subCategory)
                                    <div class="card shadow-none border-0">
                                        <ul class="list-unstyled mb-3">
                                            <li class="fs-14 fw-700 mb-3">
                                                <a class="text-reset hov-text-primary" href="/category/{{ $subCategory->name }}">{{ $subCategory->name }}</a>
                                            </li>
                                            @foreach ($subCategory->sections as $section)
                                            <li class="mb-2 fs-14 pl-2">
                                                <a class="text-reset hov-text-primary animate-underline-primary" href="/category/{{ $section->name }}">{{ $section->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>  
                                @endforeach
                            </div>
                        </div>
                    {{-- </div> --}}
                </li>
                
            @endforeach
        </ul>
    </div>
</div>
@endsection