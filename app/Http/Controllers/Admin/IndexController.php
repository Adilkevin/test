<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function home(Request $request)
    {
//        Log::info('每分钟输出一次当前的日期时间到日志当中'.date('Y-m-d H:i:s'));
        return view('admin.index.home');
    }

    public function index()
    {
        return view('admin.index.index');
    }
    public function test()
    {
        return view('admin.index.test');
    }
}
