<div class="card">
    <form onsubmit="return sortOrders(this)">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">All Orders</h5>
            </div>

                            <div class="dropdown mb-2 mb-md-0">
                    <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                        Bulk Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick="bulk_delete()"> Delete selection</a>
                    </div>
                </div>
            
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="delivery_status" id="delivery_status">
                    <option value="">Filter by Delivery Status</option>
                    <option value="pending" >Pending</option>
                    <option value="confirmed" >Confirmed</option>
                    <option value="picked_up" >Picked Up</option>
                    <option value="on_the_way" >On The Way</option>
                    <option value="delivered" >Delivered</option>
                    <option value="cancelled" >Cancel</option>
                </select>
            </div>
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="payment_status" id="payment_status">
                    <option value="">Filter by Payment Status</option>
                    <option value="paid"    >Paid</option>
                    <option value="unpaid"    >Unpaid</option>
                </select>
              </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="aiz-date-range form-control" value="" name="date" placeholder="Filter by date" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Type Order code &amp; hit Enter">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0" style="opacity: 1">
                <thead>
                    <tr>
                        <!--<th>#</th>-->
                                                    <th>
                                <div class="form-group">
                                    <div class="aiz-checkbox-inline">
                                        <label class="aiz-checkbox">
                                            <input type="checkbox" class="check-all">
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>
                                </div>
                            </th>
                                                
                        <th>Order Code:</th>
                        <th data-breakpoints="md">Num. of Products</th>
                        <th data-breakpoints="md">Customer</th>
                        <th data-breakpoints="md">Seller</th>
                        <th data-breakpoints="md">Amount</th>
                        <th data-breakpoints="md">Delivery Status</th>
                        <th data-breakpoints="md">Payment method</th>
                        <th data-breakpoints="md">Payment Status</th>
                                                <th class="text-right" width="15%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="aiz-checkbox-inline">
                                        <label class="aiz-checkbox">
                                            <input type="checkbox" class="check-one" name="id[]" value="{{ $order->id }}">
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $order->order_code }}</td>
                            <td>
                            {{ optional(optional($order)->cart)->count() }}
                            </td>
                            <td>{{ optional(optional(optional($order)->cart)->customer)->customer_name }}</td>
                            <td>{{ $order->store->name }}</td>
                            <td>
                                ₦{{ number_format($order->amount, 2) }}
                            </td>
                            <td>
                            {{ optional(optional($order)->delivery)->status }}
                            </td>
                            <td>
                            {{ $order->checkout->order_type }}
                            </td>
                            <td>
                                @if ($order->payment_status == 'paid')
                                <span class="badge badge-inline badge-success">Paid</span>  
                                @else
                                <span class="badge badge-inline badge-danger">UnPaid</span>
                                @endif
                            </td>
                             <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/orders/{{ $order->order_code }}" title="View">
                                    <i class="las la-eye"></i>
                                </a>
                                <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="/invoice/{{ $order->id }}" title="Download Invoice">
                                    <i class="las la-download"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/orders/destroy/{{ $order->id }}" title="Delete">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                                        
                </tbody>
            </table>
        </div>
    </form>
</div>