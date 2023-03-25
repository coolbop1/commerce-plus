<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'store_id', 'checkout_id', 'cart_id', 'amount', 'status', 'order_code', 'payment_status', 'tax', 'shipping', 'coupon' 
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function orderCarts()
    {
        $checkout = $this->checkout->carts()
        ->whereHas('product', function($product) { $product->where('store_id', $this->store_id);})
        ->with('product')
        ->get();
        return $checkout;
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
