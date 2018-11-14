<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userformation extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function formations(){
        return $this->belongsTo('App\Formation');
    }
}
