<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '';

    protected $maxAttempts='3';

    protected $decayMinutes='1';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return string
     */
    // public function username()
    // {
    //     return 'username';
    // }
    // public function attemptLogin(Request $request)
    // {
    //     $username = $request->input('email');
    //     $password = $request->input('password');
        
    //     // 验证用户名登录方式
    //     $usernameLogin = $this->guard()->attempt(
    //         ['username' => $username, 'password' => $password], $request->has('remember')
    //     );
    //     if ($usernameLogin) {
    //         return true;
    //     }
        
    //     // 验证手机号登录方式
    //     // $mobileLogin = $this->guard()->attempt(
    //     // ['mobile' => $username, 'password' => $password], $request->has('remember')
    //     // );
    //     // if ($mobileLogin) {
    //     // return true;
    //     // }
        
    //     // 验证邮箱登录方式
    //     $emailLogin = $this->guard()->attempt(
    //         ['email' => $username, 'password' => $password], $request->has('remember')
    //     );
    //     if ($emailLogin) {
    //         return true;
    //     }
        
    //     return false;
    // }
}
