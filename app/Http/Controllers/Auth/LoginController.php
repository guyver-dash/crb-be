<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Model\User;
use App\Model\Menu;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   
    public function login(Request $request)
    {
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
            return response()->json(['error'=>'Invalid Username or Password.'], 401); 
        } 
    }

    public function logout(Request $request) {

        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
         }

         return response()->json([
             'success' => true
         ]);
    }

    public function userMenus(){

        // $user = User::where('id', Auth::User()->id)
        // ->whereHas('roles', function($q){
        //     $q->where('parent_id', 0);
        // })->relTable()->first();
    
        // $menu = [];
        // if($user != null){
        //     $menu = \App\Model\Menu::with('allChildren')->get();
        //     $menu = $menu->filter(function($item){
        //         return $item->parent_id === 0;
        //     });
        // }

        $menu = Menu::where('parent_id', '=', 0)->with('allChildren')->get();
        return $menu;
    }

    
}
