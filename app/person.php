<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $table = 'person';

    public function admin_list()
    {
        return $this->join('role','role','r_id')->get()->toArray();
    }
}
