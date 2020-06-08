<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\MstUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * ここをユーザー登録の項目に応じてカスタマイズする
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_cd' => ['required', 'string', 'max:16', 'unique:mst_user'],
            'username' => ['required', 'string', 'max:128'],
            'name_kana' => ['string', 'max:128'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'is_admin' => ['bool'],
            'remarks' => ['string', 'max:256'],
            // 'bp_id' => ['integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * ここをユーザー登録のテーブルに応じてカスタマイズする
     *
     * @param  array  $data
     * @return \App\MstUser
     */
    protected function create(array $data)
    {
        $user = new MstUser();
        $user->user_cd = $data['user_cd'];
        $user->name = $data['username'];
        $user->name_kana = $data['name_kana'];
        $user->password = Hash::make($data['password']);
        $user->is_admin = 0;
        $user->remarks = $data['remarks'];
        $user->save();
        return $user;
        // return MstUser::create([
        //     'user_cd' => $data['user_cd'],
        //     'name' => $data['username'],
        //     'name_kana' => $data['name_kana'],
        //     'password' => Hash::make($data['password']),
        //     'is_admin' => 0,
        //     'remarks' => $data['remarks'],
        // ]);
    }
}
