<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'admin/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showPassChange ()
    {
        return view('admin.reset');
    }

    public function changePassword (Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if($user) {
            $password = $request['new-password'];
            $confirmPass = $request['confirm-password'];

            if($password === $confirmPass) {
                $newPassword = bcrypt($password);

                $user->password = $newPassword;
                $user->save();
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.changePassword')->with('error', 'Passwords do not match');
            }
        }
    }
}
