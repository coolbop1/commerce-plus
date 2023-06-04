<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovt extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }
}
