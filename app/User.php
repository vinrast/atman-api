<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;


    protected $fillable = [
        'name', 'email','password','token','avatar','role_id','team_id','boss_team'
    ];

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'rol_name','team_name'
    ];

    public function getRolNameAttribute(){
        return $this->rol->name;
    }

    public function getTeamNameAttribute(){
        return $this->team->name;
    }

    public function rol(){
        return $this->belongsTo('App\Rol','role_id')->withDefault();
    }

    public function team(){
        return $this->belongsTo('App\Team','team_id')->withDefault();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
