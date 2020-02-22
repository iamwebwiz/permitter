<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApplicationCategory extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
