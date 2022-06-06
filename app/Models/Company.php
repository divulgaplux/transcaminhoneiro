<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function trucks () {
        return $this->belongsTo(Truck::class);
    }
}
