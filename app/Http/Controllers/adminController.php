<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\Http\Requests\loginRequest;
use Session;
use DB;
class adminController extends Controller
{
    static $obj;
    static $personObj;
    public function __construct()
    {
        self::$obj = new admin;

    }

    public function dologin(loginRequest $request)
    {
        $data = $request->all();
        $res=self::$obj->dologin($data);

        if($res==null){
            echo "<script>alert('账号密码错误');history.back();</script>";
        }else{
            echo "<script>alert('登录成功');</script>";
            Session::put('user',$res['user']);
            return redirect(route('show'));
        }
    }

    public function show()
    {
       return view('index');
    }
    public function exits(){
        Session::forget('user');
    }
    public function getAdminInfo(){
        $user=Session::get('user');
        $data=DB::table('admin')->where('user',$user)->get();
        return $data;
    }

}
