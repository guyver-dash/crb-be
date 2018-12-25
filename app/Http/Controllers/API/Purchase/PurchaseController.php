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
        return response()->json([
            'purchase' => $this->purchase
                            ->where('id', '=', $request->id)
                            ->relTable()
                            ->first()
        ]);
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
           'purchase' => $this->purchase
                            ->where('id', '=', $request->id)
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
        $this->purchase->find($request->id)
                ->update([
                    'name' => $request->name
                ]);
        
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase, Request $request)
    {
        $this->purchase->delete($request->id);
        return response()->json([
            'success' => $purchase
        ]);
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
