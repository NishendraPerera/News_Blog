<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function authenticated($request,$user){
        if($user->role === 'admin'){
            return redirect()->intended('admin'); //redirect to admin panel
        }
    
        return redirect()->intended('/'); //redirect to standard user homepage
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'getLogout']);
    }

    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['login', 'getLogin']);
    // }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect('/');

        //return $this->loggedOut($request) ?: redirect('/');
    }

    // protected function validator(array $data){
    //     return Validator::make($data, [
    //         'name'=>'required|max:255',
    //         'email'=>'required|email|max:255|unique:users',
    //         'password'=>'required|confirmed|min:6',
    //     ]);
    // }
}
