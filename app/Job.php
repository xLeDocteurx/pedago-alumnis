<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    protected $fillable = [
        'company','title', 'content', 'region_id', 'location', 'outdated_at', 'author_id','refreshed_at'
    ];

    public function author(){
        return $this->belongsTo('App\User');
    }
    
    public function region(){
        return $this->belongsTo('App\Region');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
