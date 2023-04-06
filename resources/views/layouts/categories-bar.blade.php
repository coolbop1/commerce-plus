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
                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                </li>
                
            @endforeach
        </ul>
    </div>
</div>
@endsection