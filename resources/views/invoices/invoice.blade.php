<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INVOICE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
	<style media="all">
        @page {
			margin: 0;
			padding:0;
		}
		body{
			font-size: 0.875rem;
            font-family: '<?php echo  $data["font_family"] ?>';
            font-weight: normal;
            direction: <?php echo  $data['direction'] ?>;
            text-align: <?php echo  $data['text_align'] ?>;
			padding:0;
			margin:0; 
		}
		.gry-color *,
		.gry-color{
			color:#000;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:<?php echo  $data['text_align'] ?>;
		}
		.text-right{
			text-align:<?php echo  $data['not_text_align'] ?>;
		}
	</style>
</head>
<body>
	<div>

		<div style="background: #eceff4;padding: 1rem;">
			<table>
				<tr>
					<td>
							<img src="uploads/logo.png" height="30" style="display:inline-block;">
					</td>
					<td style="font-size: 1.5rem;" class="text-right strong">INVOICE</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1rem;" class="strong">{{ $data['order']->store->name }}</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">{{ $data['order']->store->shop_address }}</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">Email: {{ $data['order']->store->email ?? 'support@commerce_plus.com' }}</td>
					<td class="text-right small"><span class="gry-color small">Order ID:</span> <span class="strong">{{ $data['order']->order_code }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small">Phone: {{ $data['order']->store->shop_phone }}</td>
					<td class="text-right small"><span class="gry-color small">Order Date:</span> <span class=" strong">{{ Carbon\Carbon::parse($data['order']->created_at)->format("d-m-Y") }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small"></td>
					<td class="text-right small">
                        <span class="gry-color small">Payment method</span> 
						@php
							switch ($data['order']->checkout->order_type) {
								case 'cod':
									$payment_method = 'Cash On Delivery';
									break;
								case 'offline':
									$payment_method = 'Cash';
									break;
								
								default:
									$payment_method = ucwords($data['order']->checkout->order_type);
									break;
							}
						@endphp
                        <span class="strong">
                            {{ $payment_method }}
                        </span>
                    </td>
				</tr>
			</table>

		</div>

		<div style="padding: 1rem;padding-bottom: 0">
            <table>
				@php
					$customer = $data['order']->checkout->customer->customer_name ?? 'customer'
				@endphp
				<tr><td class="strong small gry-color">Bill to:</td></tr>
				<tr><td class="strong">{{  ucwords($customer) }}</td></tr>
				<tr><td class="gry-color small">{{ $data['order']->checkout->customer->address }}, {{ $data['order']->checkout->customer->state->name }} , Nigeria</td></tr>
				<tr><td class="gry-color small">Email: {{ $data['order']->checkout->customer->email ?? '' }}</td></tr>
				<tr><td class="gry-color small">Phone: {{ $data['order']->checkout->customer->phone }}</td></tr>
			</table>
		</div>

	    <div style="padding: 1rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%" class="text-left">Product Name</th>
						<th width="15%" class="text-left">Delivery Type</th>
	                    <th width="10%" class="text-left">Qty</th>
	                    <th width="15%" class="text-left">Unit Price</th>
	                    <th width="10%" class="text-left">Tax</th>
	                    <th width="15%" class="text-right">Total</th>
	                </tr>
				</thead>
				@php
					$orders = $data['order']->orderCarts();
				@endphp
				<tbody class="strong">
	                @foreach ($orders as $key => $order)
		                @if ($order->product != null)
							<tr class="">
								<td>
                                    {{ $order->product->name }} 
                                    {{ optional(optional($order)->product)->variation }}
                                    <br>
                                    <small>
                                        SKU: {{ $order->product->sku }}
                                    </small>
                                </td>
								<td>
									Home Delivery
									{{-- @if ($order->shipping_type != null && $order->shipping_type == 'home_delivery')
										Home Delivery
									@elseif ($order->shipping_type == 'pickup_point')
										@if ($order->pickup_point != null)
											{{ $order->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})
										@else
                                            {{ translate('Pickup Point') }}
										@endif
									@elseif ($order->shipping_type == 'carrier')
										@if ($order->carrier != null)
											{{ $order->carrier->name }} ({{ translate('Carrier') }})
											<br>
											Transit Time - {{ $order->carrier->transit_time }}
										@else
											Carrier
										@endif
									@endif --}}
								</td>
								<td class="">{{ $order->qty }}</td>
								<td class="currency">{{ $order->product->newPrice() }}</td>
								<td class="currency">{{ '0' }}</td>
			                    <td class="text-right currency">{{ $order->product->newPrice() }}</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table class="text-right sm-padding small strong">
	        	<thead>
	        		<tr>
	        			<th width="60%"></th>
	        			<th width="40%"></th>
	        		</tr>
	        	</thead>
		        <tbody>
			        <tr>
			            <td class="text-left">
							@php
								Storage::disk('public')->put($data['order']->order_code.'.png', $file = '');
							@endphp
                            {!! QrCode::size(100)->generate($data['order']->order_code, storage_path('app/public/'.$data['order']->order_code.'.png')) !!}
			            </td>
			            <td>
					        <table class="text-right sm-padding small strong">
						        <tbody>
							        <tr>
							            <th class="gry-color text-left">Sub Total</th>
							            <td class="currency">{{ $data['order']->amount }}</td>
							        </tr>
							        <tr>
							            <th class="gry-color text-left">Shipping Cost</th>
							            <td class="currency">{{ 
										//single_price($order->orderDetails->sum('shipping_cost')) 
										0
										}}</td>
							        </tr>
							        <tr class="border-bottom">
							            <th class="gry-color text-left">Total Tax</th>
							            <td class="currency">{{ 
										//single_price($order->orderDetails->sum('tax')) 
										0
										}}
										</td>
							        </tr>
				                    <tr class="border-bottom">
							            <th class="gry-color text-left">Coupon Discount</th>
							            <td class="currency">{{ 
										//single_price($order->coupon_discount) 
										0
										}}</td>
							        </tr>
							        <tr>
							            <th class="text-left strong">Grand Total</th>
							            <td class="currency">{{ 
										$data['order']->amount
									}}</td>
							        </tr>
						        </tbody>
						    </table>
			            </td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	</div>
</body>
</html>
