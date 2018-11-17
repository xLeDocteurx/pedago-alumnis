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
        'name', 'nom', 'prenom', 'region_id', 'email', 'password',
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
    
    public function myEvents(){
        return $this->hasMany('App\Event');
    }

    public function myJobs(){
        return $this->hasMany('App\Jobs');
    }


    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function region()
    {
        return $this->belongsTo('App\Regions');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }

    // contact section
    public function relate()
    {
        return $this->belongsToMany('App\User', 'contacts', 'id', 'relating_id');
    }

    public function isRelated()
    {
        return $this->belongsToMany('App\User', 'contacts', 'id', 'related_id');
    }
    // contact end
}
