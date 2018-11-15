<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function jobtags(){
        return $this->hasMany('App\Jobtag');
    }
    public function usertags(){
        return $this->hasMany('App\usertag');
    }
}
