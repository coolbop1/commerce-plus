<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "days",
        "product_cap"
    ];

    public function subscriptions() 
    {
        return $this->hasMany(Subscription::class);
    }
}
