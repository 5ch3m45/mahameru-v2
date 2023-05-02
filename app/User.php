<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'company', 'active', 'forgotten_password_code'
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

    public function arsips()
    {
        return $this->hasMany(Arsip::class, 'admin_id');
    }

    public function groups()
    {
        return $this->hasMany(UserGroup::class);
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->active == 1) {
            return '<span class="badge bg-success">Aktif</span>';
        }
        return '<span class="badge bg-danger">Nonaktif</span>';
    }

    public function getHandleAdminAttribute()
    {
        return $this->groups()->where('group_id', 1)->count() > 0;
    }

    public function getHandleSemuaArsipAttribute()
    {
        return $this->groups()->where('group_id', 2)->count() > 0;
    }

    public function getHandleArsipPublikAttribute()
    {
        return $this->groups()->where('group_id', 3)->count() > 0;
    }

    public function getHandleAduanAttribute()
    {
        return $this->groups()->where('group_id', 4)->count() > 0;
    }

    public function getHandleKlasifikasiAttribute()
    {
        return $this->groups()->where('group_id', 5)->count() > 0;
    }
}
