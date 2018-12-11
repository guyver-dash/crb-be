<?php

namespace App\Http\Controllers\API\Trademark;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Trademark;
use Auth;

class TrademarkController extends Controller
{
    public function __construct(){

        $this->authorizeResource(Trademark::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');

        $trademarks =  Trademark::where('name', 'like', '%'. $request->filter . '%')
            ->relTable()->orderBy('created_at', 'desc')->get();

        return response()->json([

            'trademarks' => $this->paginate($trademarks)

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
        Trademark::create($request->all());
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
    public function show(Trademark $trademark, Request $request)
    {
        return response()->json([

            'trademark' => Trademark::where('id',$request->id)->relTable()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trademark $trademark, Request $request)
    {
        return response()->json([

            'trademark' => Trademark::where('id',$request->id)->relTable()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Trademark $trademark, Request $request)
    {
        $trademark = Trademark::find($request->id);
        $trademark->update($request->all());

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
    public function destroy(Trademark $trademark, Request $request)
    {
        
        Trademark::find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function userTrademarks(){
        $trademarks = Trademark::whereHas('accessRights.roles.users', function($q){
            return $q->where('users.id', Auth::User()->id);
        })->relTable()->get();
        return response()->json([
            'userTrademarks' => $trademarks
        ]);
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
