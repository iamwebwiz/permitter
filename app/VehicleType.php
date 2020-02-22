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

    public function applications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Application::class, 'vehicle_type_id');
    }
}
