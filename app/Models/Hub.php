<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function localGovts() {
        return   $this->hasMany(LocalGovt::class, 'hub_id');
    }
}
