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

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    
    public function events(){
        return $this->belongsToMany('App\Event');
    }


    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function region()
    {
        return $this->belongsTo('App\Regions');
    }

    // contact section
    public function relate(){
        return $this->hasMany('App\User');
    }
    public function isRelated(){
        return $this->belongsToMany('App\User');
    }
    // contact end
}
