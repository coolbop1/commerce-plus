<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function delivery_boy()
    {
        return $this->belongsTo(DeliveryBoy::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
