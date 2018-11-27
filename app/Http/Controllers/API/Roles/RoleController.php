<?php

namespace App\Http\Controllers\API\Roles;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Auth;

class RoleController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Role::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        $roles = Role::orWhere('name', 'like', '%'. $request->filter . '%')
            ->subordinates(Auth::User())->relTable()->get();
        return response()->json([
                'roles' => $this->paginate($roles)
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
    public function show(Role $role, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, Request $request)
    {
        $role = Role::where('id', $request->id)->relTable()->first();
        $availRoles = Role::where('parent_id', '>=', $role->parent_id)
            ->where('parent_id', '>=', $role->id)
            ->get();
        return response()->json([
            'role' => $role,
            'availRoles' => $availRoles

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Request $request)
    {
        //
    }

    public function userSubRoles(){
        $roles = Role::subordinates(Auth::User())->get();
        return response()->json([
            'roles' => $roles
        ]);
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
