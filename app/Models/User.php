<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuid;

class User extends Authenticatable
{   
    use Uuid;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'no_hp',
        'email',
        'password',
        'role_id',
        'verifikasi',
        'kode_verifikasi',
        'last_login_at',
        'last_login_ip',
        'is_active','uuid','gudep_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarProfil(){
        if(!$this->photo){
            return asset('images/profil/default.png');
        }

        return asset('images/profil/'.$this->photo);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
