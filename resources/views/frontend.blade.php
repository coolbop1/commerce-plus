@include('layouts.new-product')
@include('layouts.flash-sales')
@include('layouts.todays-deal')
@include('layouts.home-page-slider')
@include('layouts.categories-bar')
@include('layouts.home-flash-deal')
@include('layouts.classified-ads')
@include('layouts.home-category-and-brand')
@section('body')
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div id="order-details-modal-body">

            </div>
        </div>
    </div>
</div>


            
    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                
            @yield('categories-bar')

            @yield('homepage-slider')

            @yield('todays-deal')
                
            </div>
        </div>
    </div>



    @yield('home-flash-deal')

    @yield('flash-sales')

    @yield('new-products')
    
    @yield('home-flash-deal')

    @yield('classified-ads')                                   

    @yield('home-flash-deal-last')

    @yield('home-category-and-brand')
            
@endsection