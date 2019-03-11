<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Repo\User\UserInterface;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserInterface $user){

        $this->user = $user;
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
            'users' => $this->user->paginate( 
                $this->user->whereLike('firstname', 'like', '%' . $request->filter . '%')
                    ->orWhere('lastname', 'like', '%' . $request->filter . '%')
                    ->orderBy('created_at', 'desc')
                    ->with(['roles', 'address', 'information'])
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
    public function store(UserFormRequest $request)
    {
        //
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
     *  Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        return response()->json([
            'user' => $this->user->where('id', $request->id)->with(['roles', 'address', 'information'])->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {

        return response()->json([
            'success' => $this->user->update($request)
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
        $this->user->find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
