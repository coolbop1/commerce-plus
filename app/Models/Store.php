<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'warehoused','shop_logo','shop_phone','shop_address','meta_title','meta_description', 'lat', 'long',
        'banner','facebook', 'instagram', 'twitter','google','youtube'
    ];

    protected $casts = [
        'warehoused' => 'boolean',
    ];

    public function users()
    {
        //return $this->belongsTo(User::class);
        return $this
            ->belongsToMany(User::class)
            ->withTimestamps();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function subscriptions() 
    {
        return $this->hasMany(Subscription::class);
    }

    public function isSubscribed()
    {
        if ($this->subscriptions()->whereDate('expiry_date',  '>', Carbon::now())->first()) {
            return true;
        }
        return false;
    }
}
