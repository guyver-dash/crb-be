<?php

namespace App\Http\Controllers\Api\AccessRight;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\AccessRight\AccessRightInterface;

class AccessRightController extends Controller
{

    protected $accessRight;
    public function __construct(AccessRightInterface $accessRight)
    {
        $this->accessRight = $accessRight;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $request = app()->make('request');
        return response()->json([
            'accessRights' => $this->accessRight->paginate( 
                $this->accessRight->whereLike('name', 'like', '%' . $request->filter . '%')
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
    public function store(Request $request)
    {
        $this->accessRight->create($request->all());
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
    public function show(Request $request)
    {
        return response()->json([
            'accessRight' => $this->accessRight->where('id', $request->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
        return response()->json([
            'accessRight' => $this->accessRight->where('id', $request->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $this->accessRight->find($request->optimus_id)->update($request->all());
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
    public function destroy(Request $request)
    {
        $this->accessRight->find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
