<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login (Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        //$remember = $request['remember'];
        
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/admin');
        } else {
            $request->session()->flash('status', 'Failed Login attempt. Please check your email/password');
            return redirect()->intended('/login');
        }
    }
    
    public function logout ()
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
