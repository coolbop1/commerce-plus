@section('brand-section')
<section class="mb-4">
    <div class="container">
        <div class="bg-white px-3 pt-3">
            <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left">
                @foreach ($brands as $brand)
                    <div class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                        <a href="/brand/{{ str_replace(' ', '-', $brand->name) }}" class="d-block p-sm-3">
                            <p class="text-center text-dark fs-14 fw-700 mt-2">{{ $brand->name }}</p>
                        </a>
                    </div>
                @endforeach
                    
            </div>
        </div>
    </div>
</section>
@endsection