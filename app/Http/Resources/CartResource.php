<?php

namespace App\Http\Resources;

use App\Models\Hub;
use App\Models\HubConnect;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       $data = [
        'id' => $this->id,
        'product_id' => $this->product->id,
        'name' => $this->product->name,
        'detail' => $this->product->detail,
        'price' => $this->product->newprice * $this->qty,
        'qty' => $this->qty,
        'weight' => $this->product->weight * $this->qty
       ];
       $route = [];
       $customer_parent_hub = optional(optional(optional($this->customer)->lga)->hub)->parent_id;
       $seller_parent_hub = optional(optional($this->product->store->lga)->hub)->parent_id;
       if($customer_parent_hub && $customer_parent_hub == $seller_parent_hub){
        $data['ship'] = 0;
       } else {
        $seller_hub = Hub::find($seller_parent_hub);
        $total_weight = $this->product->weight * $this->qty;
        $shipping = optional($this->product->store->lga)->on_forwarding ?? 0;
        $lga = $this->product->store->lga;
        $lga->type = 'town';
        if($this->Order){
            $trails = $this->Order->routeTrails ?? null;
            if($trails) {
                $trail = collect($trails)->where('destination_station_id', $lga->hub->id)->first();
                info("it ___ trail town - station".json_encode($trail));
                
                $lga->delivery_status = optional($trail)->status;
            }
        }
        $route[] = $lga;
        $seller_station = optional($this->product->store->lga)->hub;
        $seller_station->type = 'station';
        if($this->Order){
            $trails = $this->Order->routeTrails ?? optional($this->Order)['routeTrails'] ?? null;
            if($trails) {
                $trail = collect($trails)->where('destination_hub_id', $seller_station->parent_id)->whereNull('destination_station_id')->first();
                info("it ___ trail station - hub ".json_encode($trail));
                $seller_station->delivery_status = optional($trail)->status;
            }
        }
        $route[] = $seller_station;
        $seller_hub->type = 'hub';
        //info("it has order ".json_encode($this));
        if($this->Order){
            $trails = optional($this->Order)->routeTrails ?? optional($this->Order)['routeTrails'] ?? null;
            if($trails) {
                $trail = collect($trails)->where('destination_hub_id', $customer_parent_hub)->first();
                info("it ___ trail hub - hub ".json_encode($trail));
                $seller_hub->delivery_status = optional($trail)->status;
            }
        }
        $route[] = $seller_hub;
        if($seller_hub && !$this->product->is_digital) {
            switch (true) {
                case $total_weight <= 2:
                    $shipping +=  is_numeric($seller_hub->small) ? $seller_hub->small : eval("return ".str_replace('kg', $total_weight, $seller_hub->small).";");
                    break;
                case $total_weight <= 7:
                    $shipping += is_numeric($seller_hub->medium) ? $seller_hub->medium : eval("return ".str_replace('kg', $total_weight, $seller_hub->medium).";");
                    break;
                case $total_weight <= 10:
                    $shipping += is_numeric($seller_hub->large) ? $seller_hub->large : eval("return ".str_replace('kg', $total_weight, $seller_hub->large).";");
                    break;
                
                default:
                $shipping += is_numeric($seller_hub->heavy) ? $seller_hub->heavy : eval("return ".str_replace('kg', $total_weight, $seller_hub->heavy).";");
                    break;
            }
        }
        
        if($customer_parent_hub && !$this->product->is_digital){
            $travel_cost = HubConnect::where('from', $seller_parent_hub)->where('to', $customer_parent_hub)->first();
            if($travel_cost) {
                switch (true) {
                    case $total_weight <= 2:
                        $shipping +=  is_numeric($travel_cost->small) ? ($travel_cost->small ?? optional($travel_cost)->rate ?? 0) : eval("return ".str_replace('kg', $total_weight, $travel_cost->small).";");
                        break;
                    case $total_weight <= 7:
                        $shipping += is_numeric($travel_cost->medium) ? ($travel_cost->medium ?? optional($travel_cost)->rate ?? 0) : eval("return ".str_replace('kg', $total_weight, $travel_cost->medium).";");
                        break;
                    case $total_weight <= 10:
                        $shipping += is_numeric($travel_cost->large) ? ($travel_cost->large ?? optional($travel_cost)->rate ?? 0) : eval("return ".str_replace('kg', $total_weight, $travel_cost->large).";");
                        break;
                    
                    default:
                    $shipping += is_numeric($travel_cost->heavy) ? ($travel_cost->heavy ?? optional($travel_cost)->rate ?? 0) : eval("return ".str_replace('kg', $total_weight, $travel_cost->heavy).";");
                        break;
                }
            }
            // $shipping += optional($travel_cost)->rate ?? 0;
        }
        $data['ship'] = $shipping;
       }
       $data['route'] = $route;
       return $data; 
    }
}
