<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function jobs(){
        return $this->belongsToMany('App\Job');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
    public function tagfamily(){
        return $this->belongsTo('App\Tagfamily');
    }
    
}
