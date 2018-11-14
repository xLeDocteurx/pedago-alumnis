<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtag extends Model
{
    public function job(){
        return $this->belongsTo('App\Job');
        
    }
    public function Tag(){
        return $this->belongsTo('App\Tag');
    }
}
