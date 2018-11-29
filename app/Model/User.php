<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

// class User extends Model

class User extends Authenticatable 
{
    use HasApiTokens, Notifiable;
    
     protected $fillable = [
        'firstname', 'middlename', 'lastname', 'username',  'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function AauthAcessToken(){
        return $this->hasMany('App\Model\OauthAccessToken');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }

    public function holdings(){
        return $this->belongsToMany('App\Model\Holding', 'holding_user', 'user_id', 'holding_id');
    }
  
    public function information(){

        return $this->hasOne('App\Model\Information', 'user_id', 'id');
    }


    public function scopeSubordinates($query, User $user){

        return $query->whereHas('roles', function($query) use ($user) {
            //Get the roles where the parent_id is the (minimum) parent_id from the user roles
            $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->parent_id);
            //Get the roles where the parent_id is greater than or equal to the user id.
            $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->id);
            
            return $query;
        
        });
    }

    public function scopeRelTable($query){

        return $query->with(['roles.accessRights.menus', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'information']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

}
