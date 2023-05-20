<?php

namespace App\Models;

use App\Notifications\OrderPlaced;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class Store extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $fillable = [
        'name', 'warehoused','shop_logo','shop_phone','shop_address','meta_title','meta_description', 'lat', 'long',
        'banner','facebook', 'instagram', 'twitter','google','youtube', 'balance', 'approved'
    ];

    protected $casts = [
        'warehoused' => 'boolean',
        'approved' => 'boolean',
    ];

    // protected $appends = ['ratings'];

    public function users()
    {
        //return $this->belongsTo(User::class);
        return $this
            ->belongsToMany(User::class)
            ->withTimestamps();
    }

    // public function getRatingsAttribute()
    // {
    //     return $this->newPrice();  
    // }

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

    public function refundRequests()
    {
        return $this->hasMany(RefundRequest::class);
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

    public function paymentRequest()
    {
        return $this->hasMany(VendorPaymentRequest::class);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(OrderPlaced $notification): array|string
    {
        // Return email address only...
        //return $this->email_address;
 
        // Return email address and name...
        return [$this->users()->first()->email => $this->name];
    }
}
