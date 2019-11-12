<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    protected $fillable = [
        'name','status_id'
    ];

    protected $appends=[
        'status_name'
    ];

    public function getStatusNameAttribute(){
        return $this->status->name;
    }

    public function status(){
        return $this->belongsTo('App\Status')->withDefault();
    }

    public function competitions(){
        return $this->belongsToMany('App\Competition','competitions_teams');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}

