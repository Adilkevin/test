<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class UsersController extends AdminController
{
    //
    public function login(Request $request)
    {
        //错误信息反馈
        $error =[];

        if ($request->isMethod('post')) {
            $datas = $request->all();
            $user = DB::table('admin')->where('users', '=', $datas['username'])->first();

//            $rules = [
//                'username' => 'required',
//                'password' => 'required|between:6,16'
//            ];
//            $message = [
//                'username.required' => '请填写用户',
//                'password.required' => '请填写密码',
//                'password.between' => '密码在6到16位之间'
//            ];
//
//            $this->validate($request, $rules, $message);

            if ($user) {
                if (Crypt::decrypt($user->pwd) == $datas['password']) {
                    //账号密码正确
                    session(['administrator' => $user]);
                    return redirect('/admin/home');
                } else {
                    $error['msg'] = '账号密码错误';
                }
            } else {
                $error['msg'] = '账号密码错误';
            }
        }

        return view('admin.users.login', ['error' => $error]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('administrator');
        return redirect('admin/login');
    }
}
