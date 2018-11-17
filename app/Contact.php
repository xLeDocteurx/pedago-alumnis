<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function relating(){
        return $this->hasMany('App\User');
    }
    public function related(){
        return $this->hasMany('App\User');
    }
}
