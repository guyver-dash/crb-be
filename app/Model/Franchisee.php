<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Globals;
use App\Model\Branch;

class Franchisee extends Model
{
    use Globals;
    
    protected $table = 'franchisees';
    protected $fillable = [
        'name', 'desc', 'franchisable_id', 'franchisable_type', 'trademark_id'
    ];

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function trademarks(){
        return $this->hasOne('App\Model\Trademark', 'id', 'trademark_id');
    }

    public function franchisable(){

        return $this->morphTo();
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function scopeRelTable($query){

        return $query->with(['trademarks.company', 'accessRights.roles.users', 'franchisable']);
    }
}
