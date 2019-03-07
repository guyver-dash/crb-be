<?php

namespace App\Http\Controllers\Api\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Role\RoleInterface;
class DashboardRoleController extends Controller
{

    protected $role;
    public function __construct(RoleInterface $role){
        $this->role = $role;
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
            'roles' => $this->role->paginate( 
                $this->role->whereLike('name', 'like', '%' . $request->filter . '%')
                    ->orWhere('description', 'like', '%' . $request->filter . '%')
                    ->with('allChildren')
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
        
        return response()->json([
            'roles' => $this->role->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->role->create($request->all());
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
    public function edit(Request $request)
    {
        return response()->json([
            'role' => $this->role->where('id', $request->id)->with('allChildren')->first()
        ]);
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
        return response()->json([
            'success' => $this->role->find($request->id)->update($request->all())
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
        $this->role->find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
