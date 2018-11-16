<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Event extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'content', 'location', 'date', 'author_id'
    ];

    

    public function subscribers(){
        return $this->hasMany('App\User');
    }
    public function author(){
        return $this->belongsTo('App\User');
    }

    protected $date = ['deleted_at'];
}
