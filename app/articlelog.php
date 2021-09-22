<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articlelog extends Model
{
    protected $table='articlelog';
    public function getLogData($ip,$a_id){
        return $this->where('ip',$ip)->where('a_id',$a_id)->first();
    }
    public function addLog($logData){
//        dd($logData);
        return $this->insert($logData);
    }

}
