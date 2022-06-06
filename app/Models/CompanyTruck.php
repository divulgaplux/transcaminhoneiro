<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTruck extends Model
{
    public function company () {
        return $this->belongsTo(Company::class);
    }

    public function truck () {
        return $this->belongsTo(Truck::class);
    }
}
