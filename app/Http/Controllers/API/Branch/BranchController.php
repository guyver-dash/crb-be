<?php

namespace App\Http\Controllers\API\Branch;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Branch;

class BranchController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Branch::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        $branches = Branch::where('name', 'like', '%'.$request->filter . '%')
            ->relTable()
            ->get();
        
         
        return response()->json([
            'branches' => $this->paginate($branches)
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
    public function show(Branch $branch, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch, Request $request)
    {
        
        $branch = Branch::where('id',$request->id)->relTable()->first();
        $roleBranch = Branch::whereHas('accessRight.roles', function($q){
            return $q->whereIn('roles.id',[]);
        }); 
        return response()->json([
            'branch' => $branch,
            'role' => $roleBranch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Branch $branch, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch, Request $request)
    {
        //
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
