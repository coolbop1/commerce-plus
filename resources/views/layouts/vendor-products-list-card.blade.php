@section('product-list-card')
<div class="card">
    <div class="card-header row gutters-5">
        <div class="col">
            <h5 class="mb-md-0 h6">All Products</h5>
        </div>
        <div class="col-md-4">
            <form class="" id="sort_brands" action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="search" name="search"  placeholder="Search product">
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="30%">Name</th>
                    <th data-breakpoints="md">Category</th>
                    @if ($page != 'digitalproducts')
                        <th data-breakpoints="md">Qty</th>
                    @endif
                    <th>{{ $page == 'digitalproducts' ? 'Base ' : '' }}Price</th>
                    @if ($page != 'digitalproducts')
                        <th data-breakpoints="md">Approval</th>
                    @endif
                    <th data-breakpoints="md">Published</th>
                    <th data-breakpoints="md">Featured</th>
                    <th data-breakpoints="md" class="text-right">Options</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $products = $store->products->when($page == 'digitalproducts', function($q) {
                        return $q->where('is_digital', 1);
                    }, function($q) {
                        return $q->where('is_digital', 0);
                    })->sortByDesc('updated_at');
                    $key = 0;
                @endphp
                @foreach ($products as $product)
                    @php
                        $num = $key + 1;
                        $product_name_link = str_replace(' ', '-', $product->name); 
                    @endphp
                    <tr>
                        <td>{{ $num }}<span style="color: #fff">____</span></td>
                        <td>
                            <a href="/product/{{ $product_name_link }}" target="_blank" class="text-reset">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->category->name }}</td>
                        @if ($page != 'digitalproducts')
                            <td>{{ $product->quantity ? : 1 }}</td>
                        @endif
                        <td>{{ $product->price }}</td>
                        @if ($page != 'digitalproducts')
                            <td>
                                @if ($product->approved)
                                    <span class="badge badge-inline badge-success">Approved</span>
                                @else
                                    <span class="badge badge-inline badge-primary">Unapproved</span>
                                @endif
                            </td>
                        @endif
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="toggleProductColumn(this, 'published')" value="{{ $product->id }}" type="checkbox" {{ $product->published ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="toggleProductColumn(this, 'featured')" value="{{ $product->id }}" type="checkbox" {{ $product->featured ? 'checked' : '' }} >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            @if ($page == 'digitalproducts')
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="/seller/digitalproducts/{{ $product->id }}/edit" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            @else
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="/seller/product/{{ $product->id }}/edit" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            @endif
                            
                            @if ($page == 'digitalproducts')
                            <a href="/{{ $product->files }}" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                                <i class="las la-download"></i>
                            </a>
                            @else
                            <a href="/products/duplicate/{{ $product->id }}" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                                <i class="las la-copy"></i>
                            </a>
                            @endif
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/products/destroy/{{ $product->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @php
                        $key++;
                    @endphp
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection



















@section('product-list-card-temp')
<div class="card">
    <div class="card-header row gutters-5">
        <div class="col">
            <h5 class="mb-md-0 h6">All Products</h5>
        </div>
        <div class="col-md-4">
            <form class="" id="sort_brands" action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="search" name="search"  placeholder="Search product">
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="30%">Name</th>
                    <th data-breakpoints="md">Category</th>
                    <th data-breakpoints="md">Current Qty</th>
                    <th>Base Price</th>
                                                <th data-breakpoints="md">Approval</th>
                                            <th data-breakpoints="md">Published</th>
                    <th data-breakpoints="md">Featured</th>
                    <th data-breakpoints="md" class="text-right">Options</th>
                </tr>
            </thead>

            <tbody>
                                        <tr>
                        <td>1</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-ojbwu" target="_blank" class="text-reset">
                                SUNGAIT Ultra Lightweight
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            494                            </td>
                        <td>25</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="142" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="142" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/142/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/142" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/142" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>2</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" target="_blank" class="text-reset">
                                Under Armour Men&#039;s Charged Assert 9 Running Shoe
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            5000                            </td>
                        <td>120</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="117" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="117" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/117/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/117" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/117" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>3</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-qsdro" target="_blank" class="text-reset">
                                Nike Men &#039;Mercurial Superfly 7 Elite Firm Ground Football Shoe
                            </a>
                        </td>
                        <td>
                                                                Sports &amp; outdoor
                                                        </td>
                        <td>
                            492                            </td>
                        <td>15</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="32" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="32" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/32/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/32" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/32" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>4</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/soft-bamboo-boxers-for-men-cool-comfortable-breathable-mens-underwear-boxer-shorts-4i89i" target="_blank" class="text-reset">
                                Rb3030 Outdoorsman I Aviator Sunglasses
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            5000                            </td>
                        <td>95</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="31" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="31" type="checkbox"  >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/31/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/31" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/31" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>5</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/latest-coat-pant-designs-white-wedding-suits-for-men-sq38a" target="_blank" class="text-reset">
                                HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display
                            </a>
                        </td>
                        <td>
                                                                Computer &amp; Accessories
                                                        </td>
                        <td>
                            493                            </td>
                        <td>35</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="30" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="30" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/30/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/30" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/30" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>6</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/Lee-Mens-Slim-Straight-Jean-wUDEU" target="_blank" class="text-reset">
                                Lee Men&#039;s Slim Straight Jean
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            500                            </td>
                        <td>55</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="29" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="29" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/29/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/29" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/29" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>7</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/casual-garb-mens-snow-heather-fitted-t-shirt-short-sleeve-crew-neck-t-shirts-for-men-pxcim" target="_blank" class="text-reset">
                                Casual Garb Men&#039;s Snow Heather Fitted T Shirt Short Sleeve Crew Neck T-Shirts for Men
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            500                            </td>
                        <td>25</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="28" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="28" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/28/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/28" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/28" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>8</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" target="_blank" class="text-reset">
                                SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            497                            </td>
                        <td>25</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="27" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="27" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/27/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/27" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/27" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>9</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/polar-mens-waterproof-outsole-deep-tread-fully-faux-fur-lined-winter-durable-snow-boots-8kcm2" target="_blank" class="text-reset">
                                POLAR Mens Waterproof Outsole Deep Tread Fully Faux Fur Lined Winter Durable Snow Boots
                            </a>
                        </td>
                        <td>
                                                                Sports &amp; outdoor
                                                        </td>
                        <td>
                            498                            </td>
                        <td>110</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="26" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="26" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/26/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/26" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/26" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                        <tr>
                        <td>10</td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/timberland-mens-classic-leather-jean-belt-93uoq" target="_blank" class="text-reset">
                                Timberland Men&#039;s Classic Leather Jean Belt
                            </a>
                        </td>
                        <td>
                                                                Men Clothing &amp; Fashion
                                                        </td>
                        <td>
                            500                            </td>
                        <td>25</td>
                                                        <td>
                                                                        <span class="badge badge-inline badge-success">Approved</span>
                                                                </td>
                                                    <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="25" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="25" type="checkbox" checked >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                          <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="https://demo.activeitzone.com/ecommerce/seller/product/25/edit?lang=en" title="Edit">
                              <i class="las la-edit"></i>
                          </a>
                          <a href="https://demo.activeitzone.com/ecommerce/seller/products/duplicate/25" class="btn btn-soft-success btn-icon btn-circle btn-sm"  title="Duplicate">
                               <i class="las la-copy"></i>
                          </a>
                          <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="https://demo.activeitzone.com/ecommerce/seller/products/destroy/25" title="Delete">
                              <i class="las la-trash"></i>
                          </a>
                      </td>
                    </tr>
                                </tbody>
        </table>
        <div class="aiz-pagination">
            <nav>
    <ul class="pagination">
        
                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        
        
                        
            
            
                                                                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                                            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/seller/products?page=2">2</a></li>
                                                                    
        
                        <li class="page-item">
                <a class="page-link" href="https://demo.activeitzone.com/ecommerce/seller/products?page=2" rel="next" aria-label="Next »">&rsaquo;</a>
            </li>
                </ul>
</nav>

          </div>
    </div>
</div>
@endsection