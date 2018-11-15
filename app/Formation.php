<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function userformations(){
        return $this->hasMany('App\Userformation');
    }
}