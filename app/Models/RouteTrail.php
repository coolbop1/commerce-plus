<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteTrail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function order() {
        return   $this->belongsTo(Order::class, 'order_id');
    }

    public function deliveryBoy() {
        return  $this->belongsTo(DeliveryBoy::class);
    }
}
