<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function home(Request $request)
    {
//        Log::info('每分钟输出一次当前的日期时间到日志当中'.date('Y-m-d H:i:s'));
        $user = $request->user();
//        $user->assignRole('admin');
        return view('admin.index.home');
    }

    public function index(Request $request)
    {
        return view('admin.index.index');
    }
    public function test()
    {
        include_once('phpqrcode/phpqrcode.php');

        $er_dir = 'erwei' . DIRECTORY_SEPARATOR . 'ma' . DIRECTORY_SEPARATOR . date('ymd') . DIRECTORY_SEPARATOR ;
        $url = '';
        $url = $url ? $er_dir . $url : $er_dir . time() . mt_rand() . '.png';    //二维码路经
        is_dir($er_dir) OR mkdir($er_dir, 0777, true);

        $value = 'www.codeaha.com';
        \QRcode::png($value, $url);
        echo '<img src="' . URL::asset($url) . '">';
        $logo = 'images/pys1_01.jpg';
        if ($logo !== FALSE) {
            $QR = $url;

            /**
             * 创建一块画布，并从字符串中的图像流新建一副图像
             */
            $QR = imagecreatefromstring(file_get_contents($QR));
            $logo = imagecreatefromstring(file_get_contents($logo));
            var_dump($logo);
            /**
             * 重新设定与的logo比例
             */
            $QR_width = imagesx($QR);       //二维码图片宽度
            $QR_height = imagesy($QR);      //二维码图片高度
            $logo_width = imagesx($logo);   //logo图片宽度
            $logo_height = imagesy($logo);  //logo图片高度
            $logo_qr_width = $QR_width / 5;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;
            $from_width = ($QR_width - $logo_qr_width) / 2;

            /**
             * 重新组合图片并调整大小
             */
            imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                $logo_qr_height, $logo_width, $logo_height);

            /**
             * logo 二维码路径设置
             */
            $logo_dir = 'erwei'.DIRECTORY_SEPARATOR.'logo'.DIRECTORY_SEPARATOR .date('ymd') .DIRECTORY_SEPARATOR ;
            is_dir($logo_dir) OR mkdir($logo_dir, 0777, true);
            $logo_img = $logo_dir . time() . mt_rand() . '_logo.png';

            /**
             * 输出图片
             */
//            URL::asset('api/static/js/jquery-1.9.1.min.js')
            imagepng($QR, $logo_img);
            echo '<img src="' . URL::asset($logo_img) . '">';
            return $logo_img;
        } else {
            return $url;
        }

        return view('admin.index.test');
    }

    public function uploadFileAjax(Request $request)
    {
        $data = $request->all();
        return $data;
    }

}
