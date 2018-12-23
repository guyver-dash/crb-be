<?php

namespace App\Http\Controllers\API\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Purchase\PurchaseInterface;
use App\Model\Purchase;

class PurchaseController extends Controller
{

    protected $purchase;

    public function __construct(PurchaseInterface $purchase){
        $this->purchase = $purchase;
        $this->authorizeResource(Purchase::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'purchases' => $this->purchase->paginate(
                $this->purchase
                    ->where('name', 'like', '%'. app()->make('request')->filter . '%')
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->get()
            )

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
    public function store(Purchase $purchase, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase, Request $request)
    {
       return response()->json([
           'purchase' => $this->purchase->where('id', '=', $request->id)
                                        ->relTable()
                                        ->first()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Purchase $purchase, Request $request)
    {
        // $items = $this->purchase->where('id', '=', $request->id)
        // ->with([
        //     'items.logistics',
        //     'items.otherVendors',
        //     'items.branches',
        //     'items.commissaries',
        //     'commissaries.items.purchases' => function($q) use ($request) {
        //         $q->where('purchases.id', $request->id);
        //     }
        // ])
        // ->get();

        //     $k = collect($items->map(function($item){
        //         return [
        //             $item->branches,
        //             $item->logistics,
        //             $item->otherBranches,
        //             $item->commissaries
        //         ];
        //     }))->flatten(1)->filter(function($item){
        //         return $item != null;
        //     })->filter(function($item){
        //         return count($item) > 0;
        //     })->flatten(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase, Request $request)
    {
        //
    }

    public function notedBy(Request $request){

        $this->purchase->notedBy($request);
        
        return response()->json([
            'success' => true
        ]);

    }
    public function approvedBy(Request $request){

        $this->purchase->approvedBy($request);
        
        return response()->json([
            'success' => true
        ]);

    }
}
