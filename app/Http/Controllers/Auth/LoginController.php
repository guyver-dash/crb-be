<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\User;
use Auth;

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
    protected $redirectTo = '/home';

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
        if(Auth::attempt(['email' => request('username'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json([
                    'success' => $success,
                    'user' => Auth::User()->relTable()->first(),
                    'userLogin' => true
                ]); 
 
        }else if(Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json([
                    'success' => $success,
                    'user' => Auth::User()->relTable()->first(),
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
}
