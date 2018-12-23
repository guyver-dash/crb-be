<?php

namespace App\Http\Controllers\API\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Purchase;
use App\Traits\PaginateCollection;
use App\Model\Item;

class PurchaseItemsController extends Controller
{
    use PaginateCollection;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $request = app()->make('request');

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

            $k = collect($items->map(function($item){
                return [
                    $item->branches,
                    $item->logistics,
                    $item->otherBranches,
                    $item->commissaries
                ];
            }))->flatten(1)->filter(function($item){
                return $item != null;
            })->filter(function($item){
                return count($item) > 0;
            })->flatten(1);      
            
        return response()->json([
            'purchaseItems' => $this->paginate($k)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
