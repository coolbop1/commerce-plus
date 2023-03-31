<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledDelivery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function deliveryBoy()
    {
        return $this->belongsTo(DeliveryBoy::class);
    }
}
