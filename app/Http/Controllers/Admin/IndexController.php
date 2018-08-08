<?php

namespace App\Http\Controllers\Admin;

use App\models\Test;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function home(Request $request)
    {
        return view('admin.index.home');
    }

    public function index(Request $request)
    {
        return view('admin.index.index');
    }
    public function test()
    {

        return view('admin.index.test');
    }

    public function uploadFileAjax(Request $request)
    {
        $data = $request->all();
        return $data;
    }

}
