<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


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
        return view('admin.users.login');
    }



}
