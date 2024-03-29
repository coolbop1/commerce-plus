<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'customer_id', 'product_id', 'price', 'checkout_id', 'ratings', 'review_comment', 'review_published', 'qty', 'cart_type', 'session'
    ];

    protected $casts = [
        'review_published' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    // public function Order()
    // {
    //     return $this->belongsTo(Order::class);
    //     //return $this->hasOne(Order::class, 'id', 'order_id');
    // }
    protected $appends = ['Order'];

    public function getOrderAttribute()
    {
        return $this->order_();  
    }

    public function order_()
    {
       // $ckeckout = $this->checkout()->where('cart_id', $this->id)->first();
        return Order::with('routeTrails')->where('checkout_id', $this->checkout_id)->first();
    }

    public function refundRequest()
    {
        return $this->hasOne(RefundRequest::class);
    }

}
