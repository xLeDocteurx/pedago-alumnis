<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taguser extends Model
{
    public function tags(){
        return $this->hasMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
