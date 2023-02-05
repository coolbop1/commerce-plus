<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'description', 'verified',  'user_id'
    ];

    protected $casts = [
        'verified' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
