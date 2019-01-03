<?php 

namespace App\Repo\Purchase;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Purchase;
use App\Model\Item;
use Carbon\Carbon;
use Auth;

class PurchaseRepository extends BaseRepository implements PurchaseInterface{

    public function __construct(){

        $this->modelName = new Purchase();
    
    }

    public function create($request){

       return $this->modelName->create([
            'name' => $request->purchaseRequest['name'],
            'purchasable_id' => $request->purchaseRequest['purchasable_id'],
            'purchasable_type' => $request->purchaseRequest['purchasable_type'],
            'purchase_status_id' => 1,
            'purchase_no' => rand(6000, 10000),
            'prepared_by' => Auth::User()->id
        ]);
    }
    public function purchaseItems($request){

        $items = Item::whereHas('purchases', function($q) use ($request) {
            $q->where('purchase_id', $request->id);
        })

        ->with([
            'logistics.items.package',
            'logistics.items.purchases'=> function($q) use ($request) {
                $q->where('purchases.id', $request->id);
            },
            'otherVendors.items.package',
            'otherVendors.items.purchases' => function($q) use ($request) {
                $q->where('purchases.id', $request->id);
            },
            'branches.items.package',
            'branches.items.purchases' => function($q) use ($request) {
                $q->where('purchases.id', $request->id);
            },
            'commissaries.items.package',
            'commissaries.items.purchases' => function($q) use ($request) {
                $q->where('purchases.id', $request->id);
            }
        ])
        ->get();

        return collect($items->map(function($item){
                return [
                    $item->branches,
                    $item->logistics,
                    $item->otherBranches,
                    $item->commissaries
                ];
            }))
            ->flatten(1)
            ->filter(function($entities){
                return $entities != null;
            })->filter(function($entities){
                return count($entities) > 0;
            })
            ->flatten(1)
            ->unique('id');

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
    
        return response()->json([
            'success' => true
        ]);

    }

}