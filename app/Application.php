<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ApplicationCategory::class, 'application_category_id');
    }

    /**
     * Define an accessor for the "status" attribute
     *
     * @param $value
     * @return string
     */
    public function getStatusAttribute($value): string
    {
        return strtoupper($value);
    }

    /**
     * Define a mutator for the "state" attribute
     *
     * @param $value
     */
    public function setStateAttribute($value): void
    {
        $this->attributes['state'] = ucfirst($value);
    }
}
