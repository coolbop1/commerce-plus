@section('vendor-products-review-card')
<div class="card-header">
    <h5 class="mb-0 h6">Product Reviews</h5>
</div>
<div class="card-body">
    <table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th data-breakpoints="lg">Customer</th>
                <th>Rating</th>
                <th data-breakpoints="lg">Comment</th>
                <th data-breakpoints="lg">Published</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $key => $cart)
                @php
                    $num = $key + 1;
                    $slug = str_replace(' ','-',$cart->product->name);
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>
                        <a href="product/{{ $slug }}" target="_blank">{{ $cart->product->name }}</a>
                    </td>
                    <td>{{ $cart->user->name }}</td>
                    <td>
                        <span class="rating rating-sm">
                            <i class="las la-star {{ $cart->ratings >= 1 ? 'active' : '' }}"></i>
                            <i class="las la-star {{ $cart->ratings >= 2 ? 'active' : '' }}"></i>
                            <i class="las la-star {{ $cart->ratings >= 3 ? 'active' : '' }}"></i>
                            <i class="las la-star {{ $cart->ratings >= 4 ? 'active' : '' }}"></i>
                            <i class="las la-star {{ $cart->ratings >= 5 ? 'active' : '' }}"></i>
                        </span>
                    </td>
                    <td>{{ $cart->review_comment }}</td>
                    <td>
                        @if ($cart->review_published)
                            <span class="badge badge-inline badge-success">Published</span>
                        @else
                            <span class="badge badge-inline badge-primary">Unpublished</span>
                        @endif
                        
                    </td>
                </tr>
                
            @endforeach
            

        </tbody>
    </table>

</div>

@endsection







































@section('vendor-products-review-card-temp')
<div class="card-header">
    <h5 class="mb-0 h6">Product Reviews</h5>
</div>
<div class="card-body">
    <table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th data-breakpoints="lg">Customer</th>
                <th>Rating</th>
                <th data-breakpoints="lg">Comment</th>
                <th data-breakpoints="lg">Published</th>
            </tr>
        </thead>
        <tbody>
                                                                                        <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-1szdb" target="_blank">SUNGAIT Ultra Lightweight Rectangular Polarized Sunglasses UV400 Protection</a>
                        </td>
                        <td>Paul K. Jensen</td>
                        <td>
                            <span class="rating rating-sm">
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                                                            </span>
                        </td>
                        <td>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects,</td>
                        <td>
                                                                    <span class="badge badge-inline badge-success">Published</span>
                                                            </td>
                    </tr>
                                                                                                                <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/nike-men-mercurial-superfly-7-elite-firm-ground-football-shoe-zlwgn" target="_blank">Under Armour Men&#039;s Charged Assert 9 Running Shoe</a>
                        </td>
                        <td>Paul K. Jensen</td>
                        <td>
                            <span class="rating rating-sm">
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                                                                    <i class="las la-star"></i>
                                                                    </span>
                        </td>
                        <td>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects,</td>
                        <td>
                                                                    <span class="badge badge-inline badge-success">Published</span>
                                                            </td>
                    </tr>
                                                                                                                <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/sungait-ultra-lightweight-rectangular-polarized-sunglasses-uv400-protection-ojbwu" target="_blank">SUNGAIT Ultra Lightweight</a>
                        </td>
                        <td>Paul K. Jensen</td>
                        <td>
                            <span class="rating rating-sm">
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                                                            </span>
                        </td>
                        <td>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects,</td>
                        <td>
                                                                    <span class="badge badge-inline badge-success">Published</span>
                                                            </td>
                    </tr>
                                                                                                                <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <a href="https://demo.activeitzone.com/ecommerce/product/jacket-blue-plain-washington-flcm7" target="_blank">Calvin Klein Men&#039;s Slim Fit Suit Separates</a>
                        </td>
                        <td>Paul K. Jensen</td>
                        <td>
                            <span class="rating rating-sm">
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                            <i class="las la-star active"></i>
                                                                                                            </span>
                        </td>
                        <td>very good product</td>
                        <td>
                                                                    <span class="badge badge-inline badge-success">Published</span>
                                                            </td>
                    </tr>
                                                    </tbody>
    </table>
    <div class="aiz-pagination">
        
      </div>
</div>
@endsection