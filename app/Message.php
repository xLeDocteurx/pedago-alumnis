<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receiver_id', 'content',
    ];

    public function sender(){
            return $this->hasMany('App\User');
        // return $this->belongsTo('App\User');
    }

    public function receiver(){
            return $this->hasMany('App\User');
        // return $this->belongsTo('App\User');
    }
}
