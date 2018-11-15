<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function contact(){
        return $this->belongsTo('App\Contact');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
