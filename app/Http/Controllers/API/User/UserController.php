<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User; 
use Auth;


class UserController extends Controller
{
   
    public function __construct(){

        $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //user with roles
        $user = User::where('id', Auth::User()->id)
            ->with('roles')->first();

        //Get the RoleParentId
        $roleParentId = collect($user->roles)->min('parent_id');

        //Get the all the children of the role parent Id with it's children and users
        $role = \App\Model\Role::where('parent_id', $roleParentId)->with('allChildren.users')->first();

        //Looop to get the Collection of children users
        $childrenUsers = collect();
        foreach($role->allChildren as $children ){
            $childrenUsers->push($children->users);
        }

        //Loop to get the Collection of user
        $users = collect();
        foreach($childrenUsers as $nCollect){
            foreach($nCollect as $user){
                $users->push($user);
            }
        }
        
        return response()->json($users);
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
        
        User::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
                

        return response()->json([

                $request->all()
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        
        return response()->json([
                'user' => User::where('id', $id)->first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json([
               'users' => User::all()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        //
    }


    public function childrenUsers(){

        
    }

}
