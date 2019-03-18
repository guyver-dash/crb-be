<?php 

namespace App\Repo\ChartAccount;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\ChartAccount;

class ChartAccountRepository extends BaseRepository implements ChartAccountInterface{


    public function __construct(){

        $this->modelName = new ChartAccount();
    
    }

    // public function create($request){

    //    $chartAccount = $this->modelName->create($request->all());
    //    $maxAcctCode = $this->modelName->where('parent_id', 0)->max('account_code');
    //    if($request->parent_id === null){
    //         $this->find($chartAccount->id)->update([
    //             'parent_id' => 0,
    //             'account_code' => 10 + (int)$maxAcctCode
    //         ]);
            
    //    }else{
    //         $this->find($chartAccount->id)->update([
    //             'account_code' => 10 + (int)$maxAcctCode
    //         ]);
    //    }

    //    return true;
       
    // }
}