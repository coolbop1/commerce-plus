@section('reviews-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">Product Reviews</h1>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row flex-grow-1">
            <div class="col">
                <h5 class="mb-0 h6">Product Reviews</h5>
                
            </div>
            <div class="col-md-6 col-xl-4 ml-auto mr-0">
                {{-- <form class="" id="sort_by_rating" action="/reviews" method="GET">
                    <div class="" style="min-width: 200px;">
                        <select class="form-control aiz-selectpicker" name="rating" id="rating" onchange="filter_by_rating()">
                            <option value="">Filter by Rating</option>
                            <option value="rating,desc">Rating (High &gt; Low)</option>
                            <option value="rating,asc">Rating (Low &gt; High)</option>
                        </select>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>Product</th>
                    <th data-breakpoints="lg">Product Owner</th>
                    <th data-breakpoints="lg">Customer</th>
                    <th>Rating</th>
                    <th data-breakpoints="lg">Comment</th>
                    <th data-breakpoints="lg">Published</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $key => $cart)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <a href="/product/{{ $cart->product->slug }}" target="_blank" class="text-reset text-truncate-2">{{ $cart->product->name }}</a>
                        </td>
                        <td>{{ $cart->product->store->name }}</td>
                        <td>{{ $cart->customer->customer_name }}</td>
                        <td>{{ $cart->ratings }}</td>
                        <td>{{ $cart->review_comment }}</td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input 
                                    onchange="update_published(this)"  
                                    value="13" type="checkbox" 
                                    {{ $cart->review_published ? 'checked' : '' }}                                                                          >
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
                                                            
            </tbody>
        </table>
    </div>
</div>
@endsection