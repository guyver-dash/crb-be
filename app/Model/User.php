<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Traits\Model\Globals;
use App\Traits\Obfuscate\Optimuss;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Globals, Optimuss;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'username',  'email', 'password', 'status', 'mobile'
    ];

    protected $appends = ['fullname', 'optimus_id', 'role_ids'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot() {
        parent::boot();
        static::deleting(function($user) {
            $user->address()->delete();
            $user->roles()->detach();
        });
    }
    public function AauthAcessToken(){
        return $this->hasMany('App\Model\OauthAccessToken');
    }
    public function address(){
    	return $this->morphOne('App\Model\Address', 'addressable');
    }
    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }

    public function scopeRelTable($q){
        return $q->with(['roles', 'address']);
    }

    public function getFullnameAttribute(){
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getRoleIdsAttribute(){

        return $this->roles->pluck('id');
    }

    public function setMobileAttribute($val){
        return (Int)$val;
    }

}
