<?php

namespace App\Repo\Purchase;

use App\Model\Item;
use App\Model\Purchase;

class PurchaseItemsRepository extends PurchaseRepository implements PurchaseInterface
{

    public function purchase_items($request)
    {

        $items = Item::whereHas('purchases', function ($q) use ($request) {
                $q->where('purchase_id', $request->id);
            })

            ->with([
                'logistics.items.package',
                'logistics.items.purchases' => function ($q) use ($request) {
                    $q->where('purchases.id', $request->id);
                },
                'otherVendors.items.package',
                'otherVendors.items.purchases' => function ($q) use ($request) {
                    $q->where('purchases.id', $request->id);
                },
                'branches.items.package',
                'branches.items.purchases' => function ($q) use ($request) {
                    $q->where('purchases.id', $request->id);
                },
                'commissaries.items.package',
                'commissaries.items.purchases' => function ($q) use ($request) {
                    $q->where('purchases.id', $request->id);
                },
            ])
            ->orderBy('id', 'asc')
            ->get();

        return collect($items->map(function ($item) {
            return [
                $item->branches,
                $item->logistics,
                $item->otherBranches,
                $item->commissaries,
            ];
        }))
            ->flatten(1)
            ->filter(function ($entities) {
                return $entities != null;
            })->filter(function ($entities) {
            return count($entities) > 0;
        })
            ->flatten(1)
            ->unique('id');

    }

    public function purchase_item($request)
    {

        return $this->modelName->where('id', '=', $request->id)
            ->relTable()->first()
            ->items()
            ->newPivotStatement()
            ->where('id', $request->pivotId)
            ->first();

    }

    public function store($request)
    {

        $item = Item::where('id', $request->item['value'])->first();

        // collect($item->branches, $item->logistics, $item->otherVendors, $item->commissaries)->filter(function($entities){

        //     return $entities != null;

        // })->map(function($entity) use ($item, $request) {

        //     if($entity != null){
        //         $this->createByEntity($item, $entity, $request );
        //     }

        // });

        if ($item->branches != null) {

            $this->createByEntity($item, $item->branches, $request);

        } elseif ($item->logitics != null) {

            $this->createByEntity($item, $item->logitics, $request);
        } elseif ($item->otherVendors != null) {

            $this->createByEntity($item, $item->otherVendors, $request);

        } elseif ($item->commissaries != null) {

            $this->createByEntity($item, $item->commissaries, $request);
        }

        return response()->json([
            'success' => true,
        ]);

    }

    public function update($request)
    {

        $pivot = collect(
            collect($request->items)->first()['purchases']
        )->first()['pivot'];

        $this->find($pivot['purchase_id'])
            ->items()
            ->newPivotStatement()
            ->where('id', '=', $pivot['id'])
            ->update(
                $pivot
            );
    }

    public function createByEntity($item, $entities, $request)
    {

        $entity = $entities->first();
        $qty = ($request->qty * $entity->pivot->dis_percentage) / 100;
        $item->purchases()->attach($item->id, [
            'item_id' => $item->id,
            'purchase_id' => $request->purchaseId,
            'qty' => $qty,
            'price' => $entity->pivot->price,
            'freight' => $entity->pivot->freight,
            'token' => $item->id . str_random(60),
        ]);

        //Send Email...
    }

}
