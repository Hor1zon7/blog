<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use DB;

class ArticleController extends Controller
{
    static $obj;

    public function __construct()
    {
        self::$obj = new article;
    }

    public function article_list(Request $request)
    {
        $where = [];
        $condition = [];
        $time_start = '1900-1-1 00:00:00';
        $time_stop = '9999-12-31 00:00:00';
        if ($request->has('a_type') && $request->get('a_type') != null) {
            $a_type = $request->get('a_type');
            $where[] = ['a_type', '=', $a_type];
            $condition['a_type'] = $a_type;
        }
        if ($request->has('time_start') && $request->get('time_start') != null) {
            $time_start = $request->get('time_start');
//            $where[]=['time_start','=',$time_start];
            $condition['time_start'] = $time_start;
        }
        if ($request->has('time_stop') && $request->get('time_stop') != null) {
            $time_stop = $request->get('time_stop');
//            $where[]=['time_stop','=',$time_stop];
            $condition['time_stop'] = $time_stop;
        }
        if ($request->has('a_title') && $request->get('a_title') != null) {
            $a_title = $request->get('a_title');
            $where[] = ['a_title', 'like', '%' . $a_title . '%'];
            $condition['a_title'] = $a_title;
        }
        $whereBetween = [$time_start, $time_stop];
//        echo "<pre>";
//        print_r($where);
//        print_r($condition);
//        echo "</pre>";
        $data = self::$obj->showList($where, $whereBetween);
        $typeData = DB::table('articleType')->get();

        return view('article_list', compact('data', 'typeData', 'condition'), ['users' => $data]);
    }

    public function article_add()
    {
        return view('article_add');
    }

    public function putaway(Request $request)
    {
        $a_id = $request->get('a_id');
        $a_status = $request->get('a_status');
        if ($a_status == '1') {
            $res = self::$obj->putaway($a_id);
        } else {
            $res = self::$obj->puton($a_id);
        }
    }

    public function delOne(Request $request)
    {
        $a_id=$request->get('a_id');
        $res=self::$obj->delOne($a_id);
        return $res;
    }


}









