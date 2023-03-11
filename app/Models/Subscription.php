<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        "store_id",
        "package_id",
        "payment_type",
        "reference",
        "is_active",
        "start_date",
        "expiry_date",
        "subscription_amount"
    ];
    protected $casts = [
        "is_active" => 'boolean'
    ];

    public function package() 
    {
        return $this->belongsTo(Package::class);
    }

    public function store() 
    {
        return $this->belongsTo(Store::class);
    }
}
