<?php

namespace App\Http\Controllers\API\AccessRight;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccessRight;
use Auth;

class AccessRightController extends Controller
{

    public function __construct(){
        $this->authorizeResource(AccessRight::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        $accessRights = AccessRight::where('name', 'like', '%'.$request->filter . '%')
            ->relTable()
            ->get();
        return response()->json([

            'accessRights' => $this->paginate($accessRights)
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
        AccessRight::create($request->all());
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
    public function show(AccessRight $accessRight, Request $request)
    {
        $accessRight = AccessRight::find($request->id);
        return response()->json([
            'accessRight' => $accessRight
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessRight $accessRight, Request $request)
    {
        $accessRight = AccessRight::find($request->id);
        return response()->json([
            'accessRight' => $accessRight
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccessRight $accessRight, Request $request)
    {
        $accessRight = AccessRight::find($request->id);
        $accessRight->update($request->all());

        return response()->json([
            'success' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessRight $accessRight, Request $request)
    {
        $accessRight = AccessRight::find($request->id);
        $accessRight->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
