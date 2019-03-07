<?php 

namespace App\Repo\User;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\User;

class UserRepository extends BaseRepository implements UserInterface{


    public function __construct(){

        $this->modelName = new User();
    
    }

    public function update($request){

        $user = $this->find($request->id);
        $user->update( $this->fillable($request->user) );
        $user->address()->update( $this->addressFillable($request->user['address']) );
        $user->roles()->sync($request->user['role_ids']);
        return true;

    }


}