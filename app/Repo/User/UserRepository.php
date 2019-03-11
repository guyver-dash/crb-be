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

        $user = $this->find($request->optimus_id);
        $user->update( $this->fillable($request->all()) );
        $user->address()->update( $this->addressFillable($request->address) );
        $user->information()->update( $this->informationFillable($request->information));
        $user->roles()->sync($request->role_ids);
        return true;

    }


}