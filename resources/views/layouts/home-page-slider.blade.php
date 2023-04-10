@section('homepage-slider')
<div class=" col-lg-7 ">
    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                                                {{-- <div class="carousel-box">
<a href="/">
<img
    class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
    src="https://demo.activeitzone.com/ecommerce/public/uploads/all/faEi771HIT7B9yPye5YqXip8EBMXa4VQBLhksq2g.png"
    alt="Active eCommerce CMS promo"
                                                height="315"
                                                onerror="this.onerror=null;this.src='/assets/img/placeholder-rect.jpg';"
>
</a>
</div> --}}
                    <div class="carousel-box">
<a href="/">
<img
    class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
    src="/assets/img/Slider banner   2.jpg"
    alt="Active eCommerce CMS promo"
                                                height="315"
                                                onerror="this.onerror=null;this.src='/assets/img/placeholder-rect.jpg';"
>
</a>
</div>
                    <div class="carousel-box">
<a href="/">
<img
    class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
    src="/assets/img/Slider banner 1.jpg"
    alt="Active eCommerce CMS promo"
                                                height="315"
                                                onerror="this.onerror=null;this.src='/assets/img/placeholder-rect.jpg';"
>
</a>
</div>
                    <div class="carousel-box">
<a href="/">
<img
    class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
    src="/assets/img/Slider banner  – 3.jpg"
    alt="Active eCommerce CMS promo"
                                                height="315"
                                                onerror="this.onerror=null;this.src='/assets/img/placeholder-rect.jpg';"
>
</a>
</div>
            </div>
                        <ul class="list-unstyled mb-0 row gutters-5">
                            @foreach ($categories->take(6) as $key => $category)
                                @php
                                    $list_number = $key + 1;
                                    $categoryName = $category->name;
                                    $name_string = str_replace(' ', '-',$categoryName);
                                    $cat_name = str_replace('-', ':::', $categoryName);
                                    $cat_name_slug = str_replace(' ', '-', $cat_name);
                                @endphp
                                <li class="minw-0 col-4 col-md mt-3">
                                    <a href="/category/{{ $cat_name_slug }}" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                    <img
                                        src="/assets/img/placeholder.jpg"
                                        data-src="/download/{{ $name_string }}.jpeg"
                                        alt="{{ $category->name }}"
                                        class="lazyload img-fit"
                                        height="78"
                                        onerror="this.onerror=null;this.src='/assets/img/placeholder-rect.jpg';"
                                    >
                                    <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{ $category->name }}</div>
                                    </a>
                                </li>
                            @endforeach
                    
                    {{-- <li class="minw-0 col-4 col-md mt-3">
<a href="https://demo.activeitzone.com/ecommerce/category/mobile-phones" class="d-block rounded bg-white p-2 text-reset shadow-sm">
<img
    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/JRAqGXo7vQD0rgAPzJnyFVjWJN4VlGR4eQTNkUKP.png"
    alt="Mobile Phones"
    class="lazyload img-fit"
    height="78"
    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
>
<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Mobile Phones</div>
</a>
</li>
                    <li class="minw-0 col-4 col-md mt-3">
<a href="https://demo.activeitzone.com/ecommerce/category/women-dress-04vbn" class="d-block rounded bg-white p-2 text-reset shadow-sm">
<img
    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/xg4lbDBbbIKJeZGE1xkn3k0g3PVeprNNHmezOwhd.png"
    alt="Baby Dresses"
    class="lazyload img-fit"
    height="78"
    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
>
<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Baby Dresses</div>
</a>
</li>
                    <li class="minw-0 col-4 col-md mt-3">
<a href="https://demo.activeitzone.com/ecommerce/category/men-formal-dress-0odnx" class="d-block rounded bg-white p-2 text-reset shadow-sm">
<img
    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/lS4LNtTDlbBoEpwsxIieqVTd0WUiUGkj54SuKkPl.png"
    alt="Men Formal Dress"
    class="lazyload img-fit"
    height="78"
    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
>
<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Men Formal Dress</div>
</a>
</li>
                    <li class="minw-0 col-4 col-md mt-3">
<a href="https://demo.activeitzone.com/ecommerce/category/doll-niia5" class="d-block rounded bg-white p-2 text-reset shadow-sm">
<img
    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/YxqVTyAxbqDphgEHg8pSBiQ7Z6RVAZgrMMRKp4iX.png"
    alt="Kids &amp; Toy"
    class="lazyload img-fit"
    height="78"
    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
>
<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Kids &amp; Toy</div>
</a>
</li>
                    <li class="minw-0 col-4 col-md mt-3">
<a href="https://demo.activeitzone.com/ecommerce/category/tools-vgs3d" class="d-block rounded bg-white p-2 text-reset shadow-sm">
<img
    src="https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg"
    data-src="https://demo.activeitzone.com/ecommerce/public/uploads/all/0xydX0EqPmMjchMD9wc337vlHbZk9BQLIPlfisEp.png"
    alt="Tools"
    class="lazyload img-fit"
    height="78"
    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder-rect.jpg';"
>
<div class="text-truncate fs-12 fw-600 mt-2 opacity-70">Tools</div>
</a>
</li> --}}
            </ul>
</div>
@endsection