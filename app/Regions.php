<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
}
