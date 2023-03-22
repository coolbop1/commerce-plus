<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'store_id', 'checkout_id', 'cart_id', 'amount', 'status', 'order_code', 'payment_status'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
