<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\person;
class personController extends Controller
{
    static $obj;
    public function __construct(){
        self::$obj=new person;
    }
    public function welcome(){
        return view("welcomes");
    }
    public function admin_list(){
        $data=self::$obj->admin_list();
        return view('admin_list',compact('data'));
    }

}
