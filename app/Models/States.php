<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country() {
      return  $this->belongsTo(Countries::class);
    }

    // public function localGovts() {
    //  return   $this->hasMany(LocalGovt::class, 'state_id');
    // }
}
