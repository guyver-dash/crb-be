<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User; 
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
                    'userLogin' => true
                ]); 
 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 


    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                }
                $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')->accessToken; 
                $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this->successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
    
}
