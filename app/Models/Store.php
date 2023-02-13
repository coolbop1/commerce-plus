<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'warehoused'
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
}
