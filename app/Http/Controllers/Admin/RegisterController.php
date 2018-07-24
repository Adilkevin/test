<?php
/**
 * User: leeray
 * Date: 2018/7/23
 * Time: 10:10
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\AdminController;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class RegisterController extends AdminController
{
    use RegistersUsers;

    protected $redirectTo = '/admin/home';

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        echo 111;exit;

//        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:username',
//            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function guard()
    {
        return Auth::guard();
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Crypt::encrypt($data['password']),
        ]);
    }

}