<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin', 'roleID', 'status', 'contact', 'address', 'state', 'verified',
        'city', 'postCode', 'country', 'points', 'img', 'ref', 'locationID', 'userLevel'
    ];

    public function role(){
        return $this->belongsTo('App\Role', 'roleID');
    }

    public function orders(){
        return $this->hasMany('App\Orders', 'userID', 'id');
    }

    public function location(){
        return $this->belongsTo('App\Locations', 'locationID');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

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
}
