<?php

namespace App\Http\Controllers\API\Branch;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Company;
use Auth;

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

        Log::info('User Access the branch:'. Auth::User());

        $request = app()->make('request');
        $branches = Branch::where('name', 'like', '%'.$request->filter . '%')
            ->relTable()
            ->orderBy('created_at', 'desc')
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
        $branch = Branch::create($request['branch']);
        $branch = Branch::find($branch->id);
        $branch->address()->create($request['address']);
        $branch->businessInfo()->create($request['businessInfo']);

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
    public function show(Branch $branch, Request $request)
    {
        $branch = Branch::where('id',$request->id)->relTable()->first();
        return response()->json([
            'branch' => $branch
        ]);
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
            'role' => $roleBranch,
            'userRoles' => \Auth::user()->roles
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
        
        $branch = Branch::find($request->id);
        $branch->update($request->all());
        $branch->address()->update([
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'brgy_id' => $request->brgy_id
        ]);
        $branch->businessInfo()->update([
            'business_type_id' => $request->business_type_id,
            'vat_type_id' => $request->vat_type_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'tin' => $request->tin,
            'website' => $request->website
        ]);
        return response()->json([
            'branch' => Branch::where('id',$request->id)->relTable()->first(),
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch, Request $request)
    {
        
        $branch = Branch::find($request->id);
        $branch->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function userBranches(){
        $branches = Branch::whereHas('accessRights.roles.users', function($q){
            return $q->where('users.id', Auth::User()->id);
        })->get();
        return response()->json([
            'userBranches' => $branches
        ]);
       
      
    }

    
}
