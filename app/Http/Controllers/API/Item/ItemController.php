<?php

namespace App\Http\Controllers\API\Item;

use App\Traits\PaginateCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;

class ItemController extends Controller
{
    use PaginateCollection;

    public function __construct(){

        $this->authorizeResource(Item::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'items' => $this->paginate(
                Item::where('name', 'like', '%'. app()->make('request')->filter . '%')
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
    public function store(Item $item, Request $request)
    {
       Item::create($request->all());
       return response()->json([
           'success' => true
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item, Request $request)
    {
        return response()->json([
            'item' => Item::where('id', $request->id)
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
    public function edit(Item $item, Request $request)
    {
        return response()->json([
            'item' => Item::where('id', $request->id)
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
    public function update(Item $item, Request $request)
    {
        $item = Item::find($request->id);
        $item->update($request->all());

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
    public function destroy(Item $item, Request $request)
    {
        Item::find($request->id)->delete();

        return response()->json([
            'item' => true
        ]);
    }
}
