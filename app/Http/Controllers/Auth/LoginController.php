<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
//    protected $redirectTo = '/teacher/evaluation/portal';


    public function showLoginForm()
    {
        return view('auth.login');
    }
    protected function authenticated(Request $request, $user)
    {
        if($user->roles->pluck('name')[0] == 'dean'){
            return redirect()->route('dean.dashboard');
        }
        if($user->roles->pluck('name')[0] == 'teacher'){
            return redirect()->route('teacher.dashboard');
        }
        if($user->roles->pluck('name')[0] == 'hr'){
            return redirect()->route('hr.dashboard');
        }
        return redirect()->route('login');
    }

    /**
         * Create a new controller instance.
         *
         * @return void
         */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    public function showLoginForm()
//    {
//        return view('auth.login');
//    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect(route('home'));
    }
}
