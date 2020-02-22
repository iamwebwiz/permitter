<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public const PENDING_STATUS = 'pending';

    public const REVIEWED_STATUS = 'reviewed';

    public const PROCESSED_STATUS = 'processed';

    public const DECLINED_STATUS = 'declined';

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
     * Define a mutator for the "state" attribute
     *
     * @param $value
     */
    public function setStateAttribute($value): void
    {
        $this->attributes['state'] = ucfirst($value);
    }
}
