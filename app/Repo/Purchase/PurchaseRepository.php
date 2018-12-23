<?php 

namespace App\Repo\Purchase;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Purchase;
use Carbon\Carbon;
use Auth;

class PurchaseRepository extends BaseRepository implements PurchaseInterface{

    public function __construct(){

    $this->modelName = new Purchase();
    
    }

    public function notedBy($request){
      $this->modelName->find( $request->id )
            ->update([
                'noted_by' => Auth::User()->id,
                'noted_date' => Carbon::now()
            ]);
    }

    public function approvedBy($request){
      $this->modelName->find( $request->id )
        ->update([
            'approved_by' => Auth::User()->id,
            'approved_date' => Carbon::now()
        ]);
    }

}