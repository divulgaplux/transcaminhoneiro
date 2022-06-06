<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function company () {
        return $this->belongsTo(Company::class);
    }
    public function shipping () {
        return $this->belongsTo(Shipping::class);
    }
}
