<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender(){
            return $this->hasMany('App\User');
        // return $this->belongsTo('App\User');
    }

    public function receiver(){
            return $this->hasMany('App\User');
        // return $this->belongsTo('App\User');
    }
}
