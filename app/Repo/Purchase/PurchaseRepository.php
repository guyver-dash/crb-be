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

    public function delete($purchaseId){
        $purchase = $this->find($purchaseId);
        $purchase->items()->detach();
        $purchase->delete();
    }
    public function notedBy($request){
      $this->modelName->find( $request->id )
            ->update([
                'noted_by' => Auth::User()->id,
                'noted_date' => Carbon::now()
            ]);
    }

    public function approvedBy($request){
     
      $purchase = $this->modelName->find( $request->id );

      if($purchase->noted_by === null){
        return response()->json(['message'=>'Invalid approve without noted by...'], 401); 
      }
        $purchase->update([
            'approved_by' => Auth::User()->id,
            'approved_date' => Carbon::now(),
            'purchase_status_id' => 2
        ]);
        

        foreach($purchase->items as $item){
            
            //send Email Notification to vendors... and wait for confirmation by the vendors
            //for delivery date

            $purchase->items()
                ->newPivotStatement()
                ->where('id', $item->pivot->id)
                ->update([
                    'token' => $item->id . str_random(60) 
                ]);

        }

    }

}