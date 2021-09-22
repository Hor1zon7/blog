<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';
    public function dologin($data)
    {
        $user = $data['user'];
        $password = $data['password'];
        return $this->where('user', $user)->where('password', $password)->first();
    }
}







