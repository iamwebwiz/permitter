<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = ucwords($value);
    }
}
