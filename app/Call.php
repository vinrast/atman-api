<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    
    protected $fillable = [
        'name','team_id','deadline','final_date','proposed_end','position','address',
        'description','status_id'
    ];

    protected $dates = [
        'final_date','proposed_end'
    ];

    protected $appends=[
        'status_name','date_form','team_name'
    ];

    public function getDateFormAttribute(){
        return $this->proposed_end->formatLocalized('%d de %B de %Y');
    }

    public function getStatusNameAttribute(){
        return $this->status->name;
    }

    public function getTeamNameAttribute(){
        return $this->team->name;
    }

    public function status(){
        return $this->belongsTo('App\Status')->withDefault();
    }

    public function team(){
        return $this->belongsTo('App\Team')->withDefault();
    }

    public function competitions(){
        return $this->belongsToMany('App\Competition','calls_competitions');
    }
}
