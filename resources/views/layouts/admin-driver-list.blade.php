@section('admin-driver-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">All Delivery Boys</h1>
        </div>
        <div class="col text-right">
            <a href="/admin/delivery-boys/create" class="btn btn-circle btn-info">
                <span>Add New Delivery Boy</span>
            </a>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header d-block d-lg-flex">
        <h5 class="mb-0 h6">Delivery Boys</h5>
        <div class="">
            <form class="" id="sort_delivery_boys" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 250px;">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Type email or name &amp; Enter">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>Name</th>
                    <th data-breakpoints="lg">Email Address</th>
                    <th data-breakpoints="lg">Phone</th>
                    <th>Earning</th>
                    <th>Collection</th>
                    <th width="10%">Options</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($delivery_boys as $delivery_boy)
                @php
                $num++;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td> {{ $delivery_boy->user->name }}</td>
                    <td><a href="mail-to" class="" >{{ $delivery_boy->user->email }}</a></td>
                    <td>{{ $delivery_boy->phone }}</td>
                    <td>
                        ₦{{ number_format($delivery_boy->balance, 2) }}
                    </td>
                    <td>
                        ₦{{ number_format($delivery_boy->collecting, 2) }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-circle btn-soft-primary btn-icon dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="las la-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <a href="/admin/delivery-boys/{{ $delivery_boy->id }}/edit" class="dropdown-item">
                                    Edit
                                    </a>
                                    @if ($delivery_boy->is_banned)
                                    <a href="#" onclick="confirm_unban('/admin/delivery-boy/unban/{{ $delivery_boy->id }}');" class="dropdown-item">
                                        Unban this delivery boy
                                        <i class="fa fa-ban text-danger" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="#" onclick="confirm_ban('/admin/delivery-boy/ban/{{ $delivery_boy->id }}');" class="dropdown-item">
                                        Ban this delivery boy
                                        <i class="fa fa-ban text-danger" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                    
                                    <a href="#" onclick="show_order_collection_modal({{ $delivery_boy->id }});" class="dropdown-item">
                                        Go to Collection
                                    </a>
                                    <a href="#" onclick="show_delivery_earning_modal({{ $delivery_boy->id }});" class="dropdown-item">
                                        Go to Payment
                                    </a>
                            </div>
                        </div>

                    </td>
                </tr>
                    
                @endforeach





        </tbody>
        </table>
        <div class="aiz-pagination">
            
        </div>
    </div>
</div>


<div class="modal fade" id="collection_modal">
    <div class="modal-dialog">
        <div class="modal-content" id="collection-modal-content">

        </div>
    </div>
</div>

<div class="modal fade" id="payment_modal">
    <div class="modal-dialog">
        <div class="modal-content" id="payment-modal-content">

        </div>
    </div>
</div>

<div class="modal fade" id="confirm-ban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to ban this delivery_boy?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <a type="button" id="confirmation" class="btn btn-primary">Proceed!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-unban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to unban this delivery_boy?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <a type="button" id="confirmationunban" class="btn btn-primary">Proceed!</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    (function($) {
        "use strict";
    
    })(jQuery);
    
    function show_order_collection_modal(id){
        // $.post('https://demo.activeitzone.com/ecommerce/admin/delivery-boy/order-collection',{
        //     _token  :'UMQFUXWBrCajUpJMAB585j7um8kO4qRQKGvQab3l',
        //     id      :id
        // }, function(data){
        //     $('#collection_modal #collection-modal-content').html(data);
        //     $('#collection_modal').modal('show', {backdrop: 'static'});
        // });
        $('#collection_modal #collection-modal-content').html('');
        $('#collection_modal').modal('show', {backdrop: 'static'});
    }

    function show_delivery_earning_modal(id){
        // $.post('https://demo.activeitzone.com/ecommerce/admin/delivery-boy/delivery-earning',{
        //     _token  :'UMQFUXWBrCajUpJMAB585j7um8kO4qRQKGvQab3l',
        //     id      :id
        // }, function(data){
        //     $('#payment_modal #payment-modal-content').html(data);
        //     $('#payment_modal').modal('show', {backdrop: 'static'});
        // });
        $('#payment_modal #payment-modal-content').html('');
        $('#payment_modal').modal('show', {backdrop: 'static'});
    }

    function sort_delivery_boys(el){
        $('#sort_delivery_boys').submit();
    }
    function confirm_ban(url)
    {
        $('#confirm-ban').modal('show', {backdrop: 'static'});
        document.getElementById('confirmation').setAttribute('href' , url);
    }

    function confirm_unban(url)
    {
        $('#confirm-unban').modal('show', {backdrop: 'static'});
        document.getElementById('confirmationunban').setAttribute('href' , url);
    }

</script>
@endsection