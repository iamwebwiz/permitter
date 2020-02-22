<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /** @var string */
    public const APPLICANT_ROLE = 'applicant';

    /** @var string */
    public const REVIEWER_ROLE = 'reviewer';

    /** @var string */
    public const PROCESSOR_ROLE = 'processor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship with UserDetail model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    /**
     * Get the dashboard link of user
     *
     * @return string
     */
    public function getDashboardLinkAttribute(): string
    {
        return '/home';
    }

    /**
     * Get the full name of the user
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->last_name}";
    }
}
