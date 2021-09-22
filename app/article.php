<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'article';

    public function showList($where, $whereBetween)
    {
        return $this->join('articleType', 'a_type', 't_id')->where($where)->whereBetween('update_at', $whereBetween)->paginate(5);
    }

    public function putaway($a_id)
    {
        return $this->where('a_id', $a_id)->update(['a_status' => '2']);
    }

    public function puton($a_id)
    {
        return $this->where('a_id', $a_id)->update(['a_status' => '1']);
    }

    public function delOne($a_id)
    {
        return $this->where('a_id', $a_id)->delete();
    }

    public function index()
    {
        $data1 = $this->join('articleType', 'a_type', 't_id')->orderBy('click', 'desc')->limit(3)->get()->toArray();
        $data2 = $this->join('articleType', 'a_type', 't_id')->orderBy('click', 'desc')->offset(3)->limit(8)->paginate(3);
        $arr = [$data1, $data2];
        return $arr;
    }

    public function detail($id)
    {
        return $this->join('articleType', 'a_type', 't_id')->where('a_id', $id)->first()->toArray();
    }

    public function addClick($a_id)
    {
        $data=$this->where('a_id',$a_id)->first()->toarray();
        $click=$data['click']+1;
//        dd($data);
        $this->where('a_id',$a_id)->update(['click'=>$click]);
    }
}
