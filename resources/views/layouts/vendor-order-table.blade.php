@section('orders-table')
<div class="card">
    <form id="sort_orders" action="" method="GET">
      <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
          <h5 class="mb-md-0 h6">Orders</h5>
        </div>
          <div class="col-md-3 ml-auto">
              <select class="form-control aiz-selectpicker" data-placeholder="Filter by Payment Status" name="payment_status" onchange="sort_orders()">
                  <option value="">Filter by Payment Status</option>
                  <option value="paid" >Paid</option>
                  <option value="unpaid" >Unpaid</option>
              </select>
          </div>

          <div class="col-md-3 ml-auto">
            <select class="form-control aiz-selectpicker" data-placeholder="Filter by Payment Status" name="delivery_status" onchange="sort_orders()">
                <option value="">Filter by Deliver Status</option>
                <option value="pending" >Pending</option>
                <option value="confirmed" >Confirmed</option>
                <option value="on_delivery" >On Delivery</option>
                <option value="delivered" >Delivered</option>
            </select>
          </div>
          <div class="col-md-3">
            <div class="from-group mb-0">
                <input type="text" class="form-control" id="search" name="search"  placeholder="Type Order code hit Enter">
            </div>
          </div>
      </div>
    </form>

    <div class="card-body p-3">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Code:</th>
                    <th data-breakpoints="lg">Num. of Products</th>
                    <th data-breakpoints="lg">Customer</th>
                    <th data-breakpoints="md">Amount</th>
                    <th data-breakpoints="lg">Delivery Status</th>
                    <th>Payment Status</th>
                    <th class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                @php
                    $num_ = $key + 1;
                @endphp
                    <tr>
                        <td>
                            {{ $num_ }}
                        </td>
                        <td>
                            <a href="#{{ $order->order_code }}" onclick="show_order_details({{ $order->id }})">{{ $order->order_code }}</a>
                        </td>
                        <td>
                            {{ $order->checkout->carts->count() }}
                        </td>
                        <td>{{ optional(optional($order->checkout)->customer)->customer_name ?? optional(optional($order->checkout)->user)->name  }}</td>
                        <td>
                            ₦{{ $order->amount }}
                        </td>
                        <td>
                            {{ $order->delivery->status }}
                        </td>
                        <td>
                            @if ($order->payment_status == 'paid')
                            <span class="badge badge-inline badge-success">Paid</span>
                            @else
                            <span class="badge badge-inline badge-danger">UnPaid</span>
                            @endif
                            
                        </td>
                        <td class="text-right">
                            <a href="/seller/orders/{{ $order->order_code }}" class="btn btn-soft-info btn-icon btn-circle btn-sm" title="Order Details">
                                <i class="las la-eye"></i>
                            </a>
                            <a href="/seller/invoice/{{ $order->id }}" class="btn btn-soft-warning btn-icon btn-circle btn-sm" title="Download Invoice">
                                <i class="las la-download"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection