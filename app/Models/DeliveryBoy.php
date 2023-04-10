<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoy extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'is_busy' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function cancelledDeliveries()
    {
        return $this->hasMany(CancelledDelivery::class);
    }
}
