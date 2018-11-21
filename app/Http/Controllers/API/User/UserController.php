<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\User; 
use Illuminate\Support\Facades\Auth; 


class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json([
                'users' => User::all()
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
    public function edit($id)
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
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        //
    }

    public function getAuthUser(Request $request){
        
        $user = JWTAuth::toUser($request->token);

        $user = $user->with(['roles', 'menus'])->first();
        return response()->json([
            'user' => $user,
            'success' =>true,
        ]);
    }

    public function search(){
        $request = app()->make('request');
        $users = User::where('firstname', 'like', '%'. $request->search . '%')
                            ->orWhere('lastname', 'like', '%'. $request->search . '%')
                            ->get();
        $arrayUser = $users->take(10)->map(function ($item, $key) {
                    return $item->firstname . ' ' . $item->lastname;
                });
        return response()->json([
                'users' => $users,
                'arrayUser' => $arrayUser

            ]);
    }

    
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json([
                    'success' => $success,
                    'user' => Auth::User()->relTable()->first(),
                    'menus' => $this->userMenus(),
                    'userLogin' => true
                ]); 
 
        }else if(Auth::attempt(['username' => request('email'), 'password' => request('password')])) {
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json([
                    'success' => $success,
                    'user' => Auth::User()->relTable()->first(),
                    'menus' => $this->userMenus(),
                    'userLogin' => true
                ]); 
        }
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 


    }


    public function userMenus(){

        $user = User::where('id', Auth::User()->id)
        ->whereHas('roles', function($q){
            $q->where('parent_id', 0);
        })->relTable()->first();
    
        $menu = [];
        if($user != null){
            $menu = \App\Model\Menu::with('allChildren')->get();
            $menu = $menu->filter(function($item){
                return $item->parent_id === 0;
            });
        }
        
        return $menu;
    }
    
}
