@section('track-order')
<section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Track Order</span>
                </h3>
                {{-- <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="2025/01/01 00:00:00"></div> --}}
                {{-- @if (!isset($page) || $page != 'trackOrder' )  --}}
                <div class="ml-auto mr-0 ">
                    <input id="track-code" class="form-control" placeholder="Order code" >
                </div>
                <a onclick="return trackOrder()" class="ml-2 mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">Track</a>
                {{-- @endif --}}
            </div>

            
            <div id="track-container">

            </div>
        </div>
        
    </div>
</section>

@endsection