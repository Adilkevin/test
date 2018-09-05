<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class UsersController extends AdminController
{

    use AuthenticatesUsers;

    public $redirectTo = '/admin/home';

    public function username()
    {
        return 'username';
    }

    public function showLoginForm(Request $request)
    {
        $user = $request->user();
        var_dump($user);
//        dd(Crypt::encrypt(123456));
        return view('admin.users.login');
    }

    public function adminsList(Request $request)
    {
        $admins = DB::table('admins')->paginate(15);

        $data = array(
            'admins' => $admins,
        );
        return view('admin.users.admins', $data);
    }

    public function adminsForgetpwd()
    {


        $data = array(

        );
        return view('admin.users.adminsforget', $data);
    }




}
