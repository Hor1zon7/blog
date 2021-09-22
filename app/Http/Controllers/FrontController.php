<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\articlelog;

class FrontController extends Controller
{
    static $obj;

    public function __construct()
    {
        self::$obj = new article;
    }

    public function index()
    {
        $data = self::$obj->index();
        $topData = $data[0];
        $normalData = $data[1];
        dd($normalData);
        return view('fronthtml/index', compact('topData', 'normalData'));
    }

    public function articleDetail(Request $request)
    {
        $a_id = $request->get('a_id');
        $data = self::$obj->detail($a_id);
        $created_at='';
        // 获取id
        $ip = $_SERVER['REMOTE_ADDR'];
//        $ip='192.168.0.0';
//        实例化模型层
        $logobj = new articlelog;
        //查看这个ip地址下的文章是否有过查看记录
        $res = $logobj->getLogData($ip,$a_id);
//        如果没有记录，则向日志表中新增一条记录
        if (!$res) {
            $logData=array(
                'a_id' => $a_id,
                'ip' => $ip,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $end=$logobj->addLog($logData);
            //浏览数量+1
             self::$obj->addClick($a_id);
        }

        return view('fronthtml/detail', compact('data'));
    }
}
