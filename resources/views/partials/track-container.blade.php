<div class="container">
   <div class="row">
      
      <div class="col-md-12 col-lg-12">
         <div id="tracking-pre"></div>
         <div id="tracking">
            <div class="tracking-list">
                @php
                    $trails = App\Models\RouteTrail::all()->where('order_id', $order->id)->values();
                    $tracks = $track;
                    array_pop($track);
                @endphp
                @foreach ($track as $key => $route)
                @php
                    $route_trail = isset($trails[$key]) ? $trails[$key] : null;
                    if (optional($route_trail)->delivery_boy_id) {
                    $origin_type = optional($route_trail)->origin_type;
                        $description = $route['delivery_status'] == 'delivered' ? "Shipment moved from " : '';
                        switch ($origin_type) {
                            case 'town':
                                $description .= " Seller ";
                                break;
                            case 'station':
                                $description .= " Seller's Station ";
                                break;
                            
                            default:
                                $description .= " Seller's Hub  ";
                                break;
                        }
                        $description .= " To ";
                    $destination_type = optional($route_trail)->destination_type;
                        switch ($destination_type) {
                            case 'town':
                                $description = $route['delivery_status'] == 'delivered' ? "Shippment Delivered" : ' out for delivery';
                                break;
                            case 'station':
                                $description .=  " Customer's Station  ";
                                break;
                            
                            default:
                                $description .= " Customer's Hub  ";
                                break;
                        }
                    } else {
                        $description = null;
                    }
                @endphp
                
                <div class="tracking-item">
                    <div class="tracking-icon status-{{ isset($route['delivery_status']) ? $route['delivery_status'] :  'intransit'}}">
                       {{-- <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                          <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                       </svg> --}}
                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"></path>
                     </svg>
                       <!-- <i class="fas fa-circle"></i> -->
                    </div>
                    {{-- <div class="tracking-date">Aug 10, 2018<span>05:01 PM</span></div> --}}
                    @if ($route_trail)
                    <div class="tracking-date">{{ Carbon\Carbon::parse($route_trail->updated_at)->format("M d, Y") }}<span>{{ Carbon\Carbon::parse($route_trail->updated_at)->format("H:i A") }}</span></div>
                    @else
                    <div class="tracking-date">N/A<span>N/A</span></div>
                    @endif
                    <div class="tracking-content">{{ $description ?? 'N/A' }}<span>{{ $tracks[$key + 1]['name'] }} ({{  $tracks[$key + 1]['type'] }}), {{  $tracks[$key + 1]['address'] ?? (($order->checkout->customer->address ?? '-').', '. ($order->checkout->customer->phone ?? '-')) }}</span></div>
                 </div>
                @endforeach
               
            </div>
         </div>
      </div>
   </div>
</div>