<?php

namespace App\Http\Controllers\Auth;


use App\Notifications\ForgotPasswordLink;
use App\Http\Controllers\Controller;
use App\Transformers\Json;
use App\Model\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Notification;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getResetToken(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        if ($request->wantsJson()) {
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return response()->json(Json::response(null, trans('passwords.user')), 400);
            }
            $token = $this->broker()->createToken($user);
            $origin = request()->headers->get('origin');
            Notification::route('mail', $request->email)->notify(new ForgotPasswordLink([
                'token' => $token,
                'origin' => $origin
                ]));

            return response()->json(Json::response([
                'token' => $token, 
                'message' => 'Your password reset email has been sent.'
            ]));
        }
    }
}
