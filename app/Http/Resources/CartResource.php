<?php

namespace App\Http\Resources;

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
       return [
        'id' => $this->id,
        'product_id' => $this->product->id,
        'name' => $this->product->name,
        'detail' => $this->product->detail,
        'price' => $this->product->price,
       ];
    }
}
