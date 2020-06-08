<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * ログイン後にどこに遷移するかをここで決めている
     * 値は RouteServiceProvider.php で決めているのでそちらを直す
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * ユーザー認証のカスタマイズ
     *
     * デフォルトだと email フィールドを認証に使用するらしいので、 user_cd を使用するように変更する
     *
     * @return [type] [description]
     */
    public function username()
    {
        return 'user_cd';
    }
}
