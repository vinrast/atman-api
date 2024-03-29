<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';
    
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany('App/User');
    }
}

