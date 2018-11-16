<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Event extends Model
{

    protected $fillable = [
        'title', 'content', 'location', 'date', 'author_id'
    ];

    public function subscribers(){
        return $this->hasMany('App\User');
    }
    public function author(){
        return $this->belongsTo('App\User');
    }
}
