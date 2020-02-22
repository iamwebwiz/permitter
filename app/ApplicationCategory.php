<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCategory extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function applications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Application::class, 'application_category_id');
    }
}
