<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function truck () {
        // return $this->belongsTo(Truck::class,Truck::class);
        return $this->belongsTo(Truck::class);
    }
    public function company () {
        return $this->belongsTo(Company::class);
    }
    public function Rating () {
        return $this->belongsTo(Rating::class);
    }
}
