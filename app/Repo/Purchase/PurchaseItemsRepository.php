<?php 

namespace App\Repo\Purchase;

use App\Repo\BaseInterface;
use App\Model\Item;
use App\Model\Purchase;
use Carbon\Carbon;
use Auth;

class PurchaseItemsRepository extends PurchaseRepository implements PurchaseInterface{


    public function purchase_items($request){

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

    public function purchase_item($request){
     
    return $this->modelName->where('id', '=', $request->id)
            ->relTable()->first()
            ->items()
            ->newPivotStatement()
            ->where('id', $request->pivotId)
            ->first();

      
        
    }
    

}